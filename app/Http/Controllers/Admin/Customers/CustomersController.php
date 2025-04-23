<?php


namespace App\Http\Controllers\Admin\Customers;

use App\Http\Controllers\Controller;
use Modules\CashFlow\Entities\CashFlowCategory;
use Illuminate\Http\Request;
use Exception;
//MODELS
use App\Models\User;
//CONTROLLERS
use App\Http\Controllers\AdminBaseController;
// LIBS
use Auth;
Use Alert;
use DataTables;
//SERVICES
use App\Http\Services\Admin\Customers\CustomersSearchService;

class CustomersController extends AdminBaseController
{
    protected $customersSearchService;

    public function __construct(CustomersSearchService $customersSearchService)
    {
        parent::__construct();
        $this->customersSearchService = $customersSearchService;
    }

    public function index()
    {
        return view('admin.customer.index');
    }

    public function indexDatatable(Request $request)
    {
        $searchParameters = [];
        $query = $this->customersSearchService->buildQueryFromParameters($searchParameters);
        $dataTable = $this->customersSearchService->buildDatatable($query);
        return $dataTable->make(true);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|regex:/^[\pL\s\-]+$/u', // Solo letras y espacios
            'lastname' => 'required|regex:/^[\pL\s\-]+$/u', // Solo letras y espacios
            'dni' => 'required|digits:8', // Exactamente 8 dígitos
            'email' => 'required|email', // Validación de email
            'phone' => 'required|numeric', // Solo números
            'password' => 'required|confirmed', // La contraseña debe ser confirmada
            // otras reglas de validación...
        ]);

        $data['confirmation_code'] = str_random(25);
        $data['password'] = $request['password'];

        $user = new User;
        $user->name =   $request['name'];
        $user->lastname =   $request['lastname'];
        $user->dni =   $request['dni'];
        $user->phone =   $request['phone'];
        $user->email =   $request['email'];
        // $user->password =   bcrypt($request['password']);
        // $user->re_password =   bcrypt($request['password_confirmation']);
        // $user->confirmation_code =   $data['confirmation_code'];
        $user->save();

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $path = $file->store('uploads', 'local'); // Esto moverá el archivo a la carpeta 'public/storage/uploads'
            $mediaItem = $user->addMedia(public_path('storage/' . $path))->toMediaCollection('photo');
            $fullUrl = $mediaItem->getFullUrl(); // Esto te dará la URL completa del archivo
            $relativeUrl = str_replace(env('APP_URL') . '/', '', $fullUrl); // Esto eliminará el APP_URL de la URL completa
            $mediaItem->update(['url' => $relativeUrl]);
        }

        // // Send confirmation code
        // Mail::send('emails.confirmation_code', $data, function($message) use ($data) {
        //     $message->to($data['email'], $data['nombre'],$data['apellido'])
        //     ->subject('Por favor confirma tu correo.');
        // });

        Alert::success('Mensaje existoso', 'Usuario Creado');
        return redirect()->route('admin.customers.index');
    }

    public function show($uuid)
    {
        $user = User::where('uuid', '=', $uuid)->first();
        return view('admin.customer.forms.show' , ['data' => $user]);
    }

    public function edit($uuid)
    {
        $user = User::where('uuid', '=', $uuid)->first();
        return view('admin.customer.forms.edit' , ['data' => $user]);
    }

    public function update(Request $request)
    {
        $user=User::where('uuid','=',$request['uuid'])->first();
        // if(!empty($request['password'])){
        // $user->password=bcrypt($request['password']);
        // $user->re_password=$request['password_confirmation'];
        // }
        $email = User::where('email','=',$request['email'])->first();
        //strtolower trae todo en minusculas
        if($email == null or  $user->uuid == $email->uuid){
            $user->email = $request['email'];
        }else{
            Alert::error('Ups!!', 'El email ya se encuenta registrado');
            return redirect()->route('user');
        }
        $user->name =$request['name'];
        $user->lastname =$request['lastname'];
        $user->dni =$request['dni'];
        $user->phone =$request['phone'];
        //$this->ImagenUpdate($request, $user);
        $user->save();

        if ($request->hasFile('file')) {
            $user->clearMediaCollection('photo');
            $file = $request->file('file');
            $path = $file->store('uploads', 'local'); // Esto moverá el archivo a la carpeta 'public/storage/uploads'
            $mediaItem = $user->addMedia(public_path('storage/' . $path))->toMediaCollection('photo');
            $fullUrl = $mediaItem->getFullUrl(); // Esto te dará la URL completa del archivo
            $relativeUrl = str_replace(env('APP_URL') . '/', '', $fullUrl); // Esto eliminará el APP_URL de la URL completa
            $mediaItem->update(['url' => $relativeUrl]);
        }

        //le manda un mensaje al usuario
       Alert::success('Mensaje existoso', 'Cliente Modificado');
       return redirect()->route('admin.customers.index');
    }

    public function destroy(Request $request)
    {
        $user = User::where('uuid', '=', $request['uuid_delete'])->first();

        //validar que no tenga suscripciones
        if($user->subscription){
            Alert::error('Error', 'El usuario tiene una suscripcion asociada');
            flash( 'El usuario tiene una suscripcion asociada '.$user->name )->error();
            return redirect()->route('admin.customers.index');
        }

        $user->delete();

        Alert::success('Mensaje existoso', 'Usuario Eliminado');
        return redirect()->route('admin.customers.index');
    }

    //massdelete
    public function massDestroy(Request $request)
    {

        $request = $request->all();
        $uuidsString = $request['uuids'][0];
        $uuidsArray = explode(',', $uuidsString);
        $users = User::whereIn('uuid', $uuidsArray)->get();
        foreach ($users as $user) {
            //validar que no tenga suscripciones
            if($user->subscription){
                Alert::error('Error', 'El usuario tiene una suscripcion asociada');
                flash( 'El usuario tiene una suscripcion asociada '.$user->name )->error();
                return redirect()->route('admin.customers.index');
            }

            $user->delete();
        }
        Alert::success('Mensaje existoso', 'Registros Eliminados');
        return redirect()->route('admin.customers.index');

    }



}
