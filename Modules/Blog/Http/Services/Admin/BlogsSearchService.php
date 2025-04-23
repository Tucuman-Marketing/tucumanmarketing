<?php

namespace Modules\Blog\Http\Services\Admin;

use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;

use Modules\Blog\Entities\BlogPost;
use DateTime;
use DateTimeZone;
//use DateTimeZone




class BlogsSearchService
{


    public function buildQueryFromParameters($searchParameters)
    {

        $query = BlogPost::
             with(['user', 'media'])
            ->leftJoin('users', 'blog_posts.user_id', '=', 'users.id')
            ->leftJoin('blog_statuses', 'blog_posts.status_id', '=', 'blog_statuses.id')
            ->leftJoin('blog_categories', 'blog_posts.category_id', '=', 'blog_categories.id')
            ->select('blog_posts.*', 'users.name as user_name') // Selecciona todas las columnas de blogs y renombra users.name
            ->distinct();

            //busqueda General en toda la tabla
            if (!empty($searchParameters['search_general'])) {
                $query->where(function ($query) use ($searchParameters) {
                    $query->orWhere('blog_posts.title', 'LIKE', '%' . $searchParameters['search_general'] . '%')
                    ->orWhere('blog_posts.content', 'LIKE', '%' . $searchParameters['search_general'] . '%')
                    ->orWhere(function($query) use ($searchParameters) {
                    if (!empty($searchParameters['search_general'])) {
                        // Intenta convertir la fecha del formato "14 ago. 2023" a "Y-m-d"
                        $date = date('Y-m-d', strtotime($searchParameters['search_general']));
                        if ($date) {
                            $query->whereDate('blog_posts.created_at', '=', $date);
                        }
                    }
                });
            });
            }

            //buscamos por search_title
            if (!empty($searchParameters['search_title'])) {
                $keywords = explode(' ', $searchParameters['search_title']);
                foreach ($keywords as $keyword) {
                    $query->where(function ($query) use ($keyword) {
                        $query->where('blog_posts.title', 'LIKE', '%' . $keyword . '%');
                    });
                }
            }

            //buscamos por contenido
            if (!empty($searchParameters['search_content'])) {
                $keywords = explode(' ', $searchParameters['search_content']);
                foreach ($keywords as $keyword) {
                    $query->where(function ($query) use ($keyword) {
                        $query->where('blog_posts.content', 'LIKE', '%' . $keyword . '%');
                    });
                }
            }

            //buscamos por author
            if (!empty($searchParameters['search_author'])) {
                $keywords = explode(' ', $searchParameters['search_author']);
                foreach ($keywords as $keyword) {
                    $query->where(function ($query) use ($keyword) {
                        $query->where('users.name', 'LIKE', '%' . $keyword . '%');
                    });
                }
            }

            //buscamos por status
            if (!empty($searchParameters['search_status'])) {
                $query->where('blog_statuses.name', 'LIKE', '%' . $searchParameters['search_status'] . '%');
            }

             //buscamos por search_date
            if (!empty($searchParameters['search_date'])) {
                $searchDate = \Carbon\Carbon::createFromFormat('Y-m-d', $searchParameters['search_date'])->format('Y-m-d');
                $query->whereDate('blog_posts.created_at', $searchDate);
            }

            //buscamos por fecha search_date_range
            if (!empty($searchParameters['search_date_range'])) {

                $searchDateRange = explode(' A ', $searchParameters['search_date_range']);
                $searchDateRangeStart = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $searchDateRange[0] . ' 00:00:00')->format('Y-m-d H:i:s');
                $searchDateRangeEnd = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $searchDateRange[1] . ' 23:59:59')->format('Y-m-d H:i:s');
                $query->whereBetween('blog_posts.created_at', [$searchDateRangeStart, $searchDateRangeEnd]);
            }

        return $query;
    }

    public function buildDatatable($query)
    {
        $datatable =  DataTables::of($query)

        ->addColumn('image', function ($model) {
            $lastMedia = $model->getMedia('image_header')->last();
            if ($lastMedia) {
                return '<img src="' . $lastMedia->getUrl('thumb') . '" class="img-fluid" style="max-width: 100px;">';
            }
            return '<img src="' . asset('theme-admin/velvet/assets/images/sin-imagen.jpg') . '" alt="..." class="img-fluid rounded" style="max-width: 100px;">';
        })
        ->addColumn('author', function ($post) {
            return $post->user->full_name ?? 'Sin Autor';
        })
        ->addColumn('status', function ($post) {
            return $post->status ? '<span class="badge" style="background-color: ' . $post->status->color . '; color: #000;">' . $post->status->name . '</span>' : 'Sin Estatus' ;
        })
        ->addColumn('category', function ($post) {
            return $post->category ? '<span class="badge" style="background-color: ' . $post->category->color . '; color: #000;">' . $post->category->name . '</span>' : 'Sin categoría';
        })
        ->editColumn('created_at', function ($post) {
            return $post->formattedShortDate;
        })
        ->editColumn('content', function ($post) {
            return strlen($post->content) > 50 ? substr($post->content, 0, 50) . '...' : $post->content;
        })


        //ORDER COLUMN
        ->orderColumn('author', function ($query, $order) {
            $query->orderByRaw("CONCAT(users.name, ' ', users.lastname) $order");
        })
        ->rawColumns(['status','image', 'category','content']);

         return $datatable;
    }



}



