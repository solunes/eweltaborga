<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\UrlGenerator;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use AdminItem;

class ProcessController extends Controller {

	protected $request;
	protected $url;

	public function __construct(UrlGenerator $url) {
	  $this->prev = $url->previous();
	}

  public function getChangeLocale($locale) {
    \Session::put('locale', $locale);
    return redirect($this->prev);
  }

  public function getLogout() {
    if(auth()->check()){
      auth()->logout();
    }
    return redirect($this->prev);
  }

  public function getLogin() {
    if(auth()->check()){
      return redirect('inicio')->with('message_success', 'Ya tiene una sesión activa.');
    }
    return view('item.login');
  }

  public function getRegistrate() {
    if(auth()->check()){
      return redirect('inicio')->with('message_error', 'No puede registrarse si ya cuenta con una sesión activa.');
    }
    return view('item.registro-usuarios');
  }

  public function postLogin(Request $request) {
    $response = \AdminItem::post_request('user', 'login', $request);
    if($response[0]->passes()){
      $logged = false;
      if (\Auth::attempt(array('email'=>$request->input('user'), 'password'=>$request->input('password')), true)) {
        $logged = true;
      } else if (\Auth::attempt(array('username'=>$request->input('user'), 'password'=>$request->input('password')), true)) {
        $logged = true;
      } else if (\Auth::attempt(array('cellphone'=>$request->input('user'), 'password'=>$request->input('password')), true)) {
        $logged = true;
      }
      $redirect = 'inicio';
      if(session()->has('url.intended')){
          $redirect = session()->get('url.intended');
      }
      if($logged){
        if(\Auth::user()->status=='banned'){
          \Auth::logout();
          return redirect($this->prev)->with('message_error', 'Su usuario fue suspendido, contáctese con el administrador para más información.');
        } else {
          return redirect($redirect)->with('message_success', 'Su sesión fue iniciada correctamente');
        }
      } else {
        return redirect($this->prev)->with('message_error', 'No se encuentra un usuario que coincidan con estos datos. Intente nuevamente.');
      }
    } else {
      return redirect($this->prev)->with('message_error', 'Introduzca un correo electrónico y contraseña de al menos 6 carácteres.')->withErrors($response[0])->withInput();
    }
  }

  public function postRegistrate(Request $request) {
    $response = \AdminItem::post_request('user', 'send', $request);
    if($response[0]->passes()){
      if(!$user = \App\User::where('email', $request->input('email'))->first()){
        $user = new \App\User;
        $user->email = $request->input('email');
        $user->name = $request->input('name');
        $user->password = $request->input('password');
        $user->status = 'normal';
        $user->save();
        $role = \Solunes\Master\App\Role::where('name', 'member')->first();
        $user->role_user()->attach($role->id);
        $vars = ['@url@'=>url('admin'), '@name@'=>$user->name, '@email@'=>$user->email];
        \FuncNode::make_email('user_registered', [$user->email], $vars);
        return redirect($this->prev)->with('message_success', 'Su cuenta fue creada correctamente, se le envió un correo electrónico.');
      } else {
        return redirect($this->prev)->with('message_error', 'Ya se encontró una cuenta de usuario con su correo electrónico por lo que no se finalizó el registro.');
      }
    } else {
      return redirect($this->prev)->with('message_error', 'Debe llenar todos los datos para finalizar su registro.')->withErrors($response[0])->withInput();
    }
  }

  public function postProjectSupport(Request $request) {
    $project_id = $request->input('project_id');
    if($item = \App\Project::find($project_id)){
      if(\Validator::make($request->all(), \App\ProjectSupport::$rules_send)){
        $project_comment = new \App\ProjectSupport;
        $project_comment->parent_id = $item->id;
        if(auth()->check()){
          $project_comment->user_id = auth()->user()->id;
        }
        $project_comment->content = $request->input('content');
        $project_comment->save();
        return redirect($this->prev)->with('message_success', 'No se encontró un proyecto con este ID.');
      } else {
        return redirect($this->prev)->with('message_error', 'Debe llenar los datos solicitados.');
      }
    } else {
      return redirect($this->prev)->with('message_error', 'No se encontró un proyecto con este ID.');
    }
  }

  public function postProjectComment(Request $request) {
    $project_id = $request->input('project_id');
    if($item = \App\Project::find($project_id)){
      if(\Validator::make($request->all(), \App\ProjectComment::$rules_send)){
        $project_comment = new \App\ProjectComment;
        $project_comment->parent_id = $item->id;
        if(auth()->check()){
          $project_comment->user_id = auth()->user()->id;
        }
        $project_comment->content = $request->input('content');
        $project_comment->save();
        return redirect($this->prev)->with('message_success', 'No se encontró un proyecto con este ID.');
      } else {
        return redirect($this->prev)->with('message_error', 'Debe llenar los datos solicitados.');
      }
    } else {
      return redirect($this->prev)->with('message_error', 'No se encontró un proyecto con este ID.');
    }
  }

	public function postModel(Request $request) {
      $model = $request->input('model_node');
      $lang_code = $request->input('lang_code');
      $node = \Solunes\Master\App\Node::where('name', $model)->first();
      //$action = $request->input('action');
      // Medidads de seguridad
      $action = 'send';
      if($node->folder!='form'){
        return redirect($this->prev)->with(['message_error'=>'Hubo un error al procesar el formulario.']);
      }
      $response = AdminItem::post_request($model, $action, $request);
      $item = $response[1];
      $redirect = $this->prev;
      if($response[0]->passes()) {
        $item = AdminItem::post_request_success($request, $model, $item, 'process');
        if($model=='contact-form'){
          $vars = ['@url@'=>url('admin/model-list/contact-form'), '@name@'=>$item->name, '@email@'=>$item->email, '@message@'=>$item->message];
          \FuncNode::make_email('contact_form', [\FuncNode::check_var('admin_email')], $vars);
          return 'MF000';
        }

  		  return redirect($redirect)->with('message_success', trans('ajax.'.$model.'_success'));
  	  } else {
  		  return redirect($redirect)->with(array('message_error' => trans('ajax.'.$model.'_fail')))->withErrors($response[0])->withInput();
  	  }
	}

}