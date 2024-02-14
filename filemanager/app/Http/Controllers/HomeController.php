<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\FormularioDataMail;
use App\Mail\ConfirmacionEnvioMail;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function linea(Request $request)
    {
        //dd($request->all());

        $content = $request->input('content');
        //dd( $content);

        $dom = new \DomDocument();
        @$dom->loadHtml($content);
        $images = $dom->getElementsByTagName('img');
        $text = '';
        foreach($images as $image){
            $src = $image->getAttribute('src');
            $text .= trim($image->nodeValue). ' ';
        }
        $text = trim($text);
        //dd($text);

        // $data=[
        //     'nombre' =>  $request->post('nombre'). " " .$request->post('apellidos'),
        //     'ciudad' => $request->post('ciudad'),
        //     'email' => $request->post('email'),
        //     'telefono' => $request->post('telefono'),
        //     'direccion' => $request->post('direccion'),
        //     'proposito' => $request->post('proposito'),
        //     'mensaje' => $request->post('mensaje')
        // ];

        // // if ($request->hasFile('imagen')) {
        //     $imagen = $request->file('imagen');
        // //     $path = $imagen->store('ruta/donde/guardar'); // Puedes cambiar la ruta según tus necesidades
        // // }
        
        //  // Dirección de correo electrónico del remitente
        //  $email_from = $data['email'];
        //  $nombre = $request->post('nombre') . " " . $request->post('apellidos');
 
        //  // Dirección de correo electrónico para enviar el formulario (tomada de .env)
        //  $email_to = ['guillermo.videla@laserena.cl'];

        // if ($request->hasFile('imagen')) {
        //     $imagen = $request->file('imagen');
        //     $path = $imagen->store('public/photos/1');

        //     $attachmentPath = storage_path('app/' . $path);
        // }
 
        //  // Dirección de correo electrónico para CC (copia)
        //  //$cc_emails = ['guillermo.videla@laserena.cl', $email_from];

        // try {
        //     // Enviar correo electrónico a la dirección tomada de .env con copia a las direcciones CC            
        //     //dd($data);
        //     $message = new FormularioDataMail($data);

        //     if (isset($attachmentPath)) {
        //         // Adjuntar la imagen al mensaje de correo
        //         $message->attach($attachmentPath, ['as' => 'nombre_adjunto.jpg']);
        //     }

        //     Mail::to($email_to)
        //         ->send($message);
                   
        //     //dd('Correo enviado correctamente');
        //     // Mail::send('emails.profile_data', ['data' => $data], function ($message) use ($email_from, $nombre) {
        //     //     $message->from($email_from, $nombre);
        //     //     $message->cc($email_from, 'LINEA DIRECTA');
        //     //     $message->to(['noresponder@munilaserena.cl', 'raul.urqueta@laserena.cl']);
        //     //     $message->subject('Formulario Linea Directa');
        //     // });
           
        //     // Enviar correo de confirmación al remitente (email formulario)
        //     Mail::to($email_from)
        //         ->send(new ConfirmacionEnvioMail($data));
       
        //     return back()->with('success', 'Datos enviados correctamente');
        // } catch (\Exception $e) {
            
        //     return redirect()->back()->with('error', 'Error al enviar el formulario');
        // }
    }
}
