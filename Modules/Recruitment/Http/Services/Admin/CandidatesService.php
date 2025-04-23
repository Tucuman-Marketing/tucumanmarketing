<?php

namespace Modules\Recruitment\Http\Services\Admin;

use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;

use Modules\Recruitment\Entities\RecruitmentJobs;
use Modules\Recruitment\Entities\RecruitmentCandidates;
use DateTime;
use DateTimeZone;
//use DateTimeZone

class CandidatesService
{
    public function buildQueryFromParameters($searchParameters, $jobId = null)
    {


            $query = RecruitmentCandidates::with(['media', 'status', 'skills', 'languages', 'statusByJob'])
            ->select('recruitment_candidates.*')
            ->join('recruitment_candidates_skills', 'recruitment_candidates.id', '=', 'recruitment_candidates_skills.candidate_id')
            ->join('recruitment_skills', 'recruitment_candidates_skills.skill_id', '=', 'recruitment_skills.id')
            ->join('recruitment_candidates_lenguages', 'recruitment_candidates.id', '=', 'recruitment_candidates_lenguages.candidate_id')
            ->distinct();


            // Filtrar por jobId si se proporciona
            if ($jobId) {
                $query->whereHas('jobs', function ($q) use ($jobId) {
                    $q->where('recruitment_jobs.uuid', $jobId);
                });
            }

             //busqueda General en toda la tabla
             if (!empty($searchParameters['search_general'])) {
                $query->where(function ($query) use ($searchParameters) {
                    $searchTerm = '%' . $searchParameters['search_general'] . '%';

                    $query->orWhere(DB::raw("CONCAT(recruitment_candidates.name, ' ', recruitment_candidates.last_name)"), 'LIKE', $searchTerm)
                        ->orWhere('recruitment_candidates.last_name', 'LIKE', $searchTerm)
                        ->orWhere('recruitment_candidates.email', 'LIKE', $searchTerm)
                        ->orWhere('recruitment_candidates.phone', 'LIKE', $searchTerm)
                        ->orWhere('recruitment_candidates.gender', 'LIKE', $searchTerm)
                        ->orWhere(function($query) use ($searchParameters) {
                            if (!empty($searchParameters['search_general'])) {
                                // Intenta convertir la fecha del formato "14 ago. 2023" a "Y-m-d"
                                $date = date('Y-m-d', strtotime($searchParameters['search_general']));
                                if ($date) {
                                    $query->whereDate('recruitment_candidates.created_at', '=', $date);
                                }
                            }
                        });
                });
            }

            //buscamos por search_name
            if (!empty($searchParameters['search_name'])) {
                $keywords = explode(' ', $searchParameters['search_name']);
                foreach ($keywords as $keyword) {
                    $query->where(function ($query) use ($keyword) {
                        $query->where(DB::raw("CONCAT(recruitment_candidates.name, ' ', recruitment_candidates.last_name)"), 'LIKE', '%' . $keyword . '%');
                    });
                }
            }

            //buscamos por search_email
            if (!empty($searchParameters['search_email'])) {
                $keywords = explode(' ', $searchParameters['search_email']);
                foreach ($keywords as $keyword) {
                    $query->where(function ($query) use ($keyword) {
                        $query->where('recruitment_candidates.email', 'LIKE', '%' . $keyword . '%');
                    });
                }
            }

            //buscamos por search_phone
            if (!empty($searchParameters['search_phone'])) {
                $keywords = explode(' ', $searchParameters['search_phone']);
                foreach ($keywords as $keyword) {
                    $query->where(function ($query) use ($keyword) {
                        $query->where('recruitment_candidates.phone', 'LIKE', '%' . $keyword . '%');
                    });
                }
            }

            // Búsqueda por habilidades
            if (!empty($searchParameters['search_skills'])) {
                $skillIds = $searchParameters['search_skills'];
                $query->whereIn('recruitment_skills.id', $skillIds);
            }

            // Búsqueda por idiomas
            if (!empty($searchParameters['search_languages'])) {
                $language = $searchParameters['search_languages'];
                $query->whereIn('recruitment_candidates_lenguages.language', $language);
            }

            //buscamos por search_gender
            // if (!empty($searchParameters['search_gender'])) {
            //     $keywords = explode(' ', $searchParameters['search_gender']);
            //     foreach ($keywords as $keyword) {
            //         $query->where(function ($query) use ($keyword) {
            //             $query->where('recruitment_candidates.gender', 'LIKE', '%' . $keyword . '%');
            //         });
            //     }
            // }

            //buscamos por search_date
            if (!empty($searchParameters['search_date'])) {
                $searchDate = \Carbon\Carbon::createFromFormat('Y-m-d', $searchParameters['search_date'])->format('Y-m-d');
                $query->whereDate('recruitment_candidates.created_at', $searchDate);
            }

            //buscamos por fecha search_date_range
            if (!empty($searchParameters['search_date_range'])) {
                $searchDateRange = explode(' A ', $searchParameters['search_date_range']);
                $searchDateRangeStart = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $searchDateRange[0] . ' 00:00:00')->format('Y-m-d H:i:s');
                $searchDateRangeEnd = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $searchDateRange[1] . ' 23:59:59')->format('Y-m-d H:i:s');
                $query->whereBetween('recruitment_candidates.created_at', [$searchDateRangeStart, $searchDateRangeEnd]);
            }

        return $query;
    }

    public function buildDatatable($query)
    {
        $datatable =  DataTables::of($query)
        ->addColumn('cv', function ($model) {
            $cv = $model->cv;
            if ($cv) {
                // Generate the correct URL using the asset function
                $cvUrl = asset('/' . $cv);
                $iconUrl = asset('theme-admin/velvet/assets/images/icon/files/pdf.svg');
                return '<a href="' . $cvUrl . '" target="_blank"><img src="' . $iconUrl . '" alt="PDF Icon" style="width: 20px; height: 20px; margin-right: 5px;">Ver CV</a>';
            }
            return '';
        })
        ->editColumn('name', function ($model) {
            return $model->full_name;
        })
        ->editColumn('created_at', function ($model) {
            return $model->formattedShortDate;
        })
        ->addColumn('status', function ($model) {
            $statusJob = $model->statusByJob->first();
            $statusLabel = $statusJob && $statusJob->status ?
                '<span class="badge" style="background-color: ' . $statusJob->status->color . '; color: #000;">' . $statusJob->status->name . '</span>' :
                'Sin Estatus';

            return '<a href="#" onclick="openStatusModal(' . htmlspecialchars(json_encode(['id' => $model->id, 'status' => $statusJob->status->id ?? ''])) . ')">' . $statusLabel . '</a>';
        })
        ->rawColumns(['cv','status']);

         return $datatable;
    }

}
