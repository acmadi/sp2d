<?php namespace Sentinel\Middleware;

use Closure, Session, Sentry;
use Illuminate\Contracts\Routing\Middleware;
use App\Group;

class SentryAdminAccess
{

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // $name = $request->route()->getName();
        // dd($request->route()->getActionName());
        // dd($request->route()->getPath());
        // dd($name);
        // dd(get_class($request));
        // First make sure there is an active session
        if (!Sentry::check()) {
            if ($request->ajax()) {
                return response('Unauthorized.', 401);
            } else {
                return redirect()->guest(route('sentinel.login'));
            }
        }

        // Now check to see if the current user has the 'admin' permission
        if (Sentry::getUser()->hasAccess('admin')) {
            if ($request->ajax()) {
                return $next($request);    
                // return response('Unauthorized.', 401);
            } else {
                // Session::flash('error', trans('Sentinel::users.noaccess'));
                return $next($request);
                // return redirect()->route('sentinel.login');
            }
        }
        // dd(get_class(Sentry::getUser()));
        if ( !Sentry::getUser()->hasAccess('admin', false))
        {
            // dd(\Sentry::getUser()->getGroups()[0]->pivot->group_id);
            //ambil group_id lewat user_id -> lewat pivot users_group
            $group_id=\Sentry::getUser()->getGroups()[0]->pivot->group_id;
            // dd(\Sentry::getUser()->toArray());
            // dd($group_id);
            //melalui group model dengan id diatas => untuk mengambil akses menu  ( menghasilkan list akses menu)
            $akses_s = Group::find($group_id)->akses()->get()->toArray();
            // $akses = Group::find($group_id)->akses->get()->toArray();
            // dd($akses);
            $config=\Config::get('arrayactions');
            // $tables=\Config::get('tables');
            $tableSegment=$request->segment(3);            

            // echo $akses;
            $currentRoute=$request->route()->getActionName();
            $currentRouteName=$request->route()->getName();
             // dd($currentRoute).'-----<br>';
            // echo "<pre>";
            // var_dump($akses_s);
            // echo "</pre>";
            //  dd($config);
            foreach ($akses_s as $key => $akses) {
                // echo 'loop';
                    //tandai segment true or false 
                        // $tandaSegment=false;
                        // foreach ($tables as $table) {
                        //     if ($table['id']==$value['table_id']) {
                        //         if($tableSegment==$table['table'] ){
                        //             // echo "masuk tandaSegment";
                        //             // exit();
                        //             $tandaSegment=true;
                        //         }
                        //     }
                        // }

                    // $action=$value['controller'].'@'.$value['controller_method'];
                    $NamespaceAction= $config[$akses['arr_id']]['Controllers'].'@'.$config[$akses['arr_id']]['methode'];
                    $routeName=$config[$akses['arr_id']]['routeName'];
                    // $action=$value['controller'];

                    // if ($action==$currentRoute && $tandaSegment) {
                    if ($NamespaceAction==$currentRoute ) {
                            // echo $action.'--'.$currentRoute.'<br>';
                            // dd('cocok');
                        if(  $akses['akses']==1){
                            // exit('masuk');
                            // var_dump( $currentRoute  );
                            // var_dump(  $action );
                            // var_dump( $currentRoute == $action );
                            // exit();
                            // $log=new Log;
                            // $log->users_id=  \Sentry::getUser()->id;
                            // $log->group_id=  $group_id ;
                            // $log->arr_id=  $value['arr_id'];
                            // $log->table=  $tableSegment;
                            // $log->action_name=  $config[$value['arr_id']]['name'];
                            // $log->catatan=  'Ok';
                            // $log->save();
                            return $next($request);
                        }
                        else{
                            // exit('tidak bisa');

                           // $log=new Log;
                           // $namaTabel=ucfirst($tableSegment);
                           //  $log->users_id=  \Sentry::getUser()->id;
                           //  $log->group_id=  $group_id ;
                           //  $log->arr_id=  $value['arr_id'];
                           //  $log->table=  $tableSegment;
                           //  $log->action_name=  $config[$value['arr_id']]['name'];
                           //  $log->catatan=  'Gagal';
                           //  $log->save();
                            $response['code']=404;
                            $response['msg']="Anda tidak memiliki akses menu ' ".$config[$akses['arr_id']]['name']." ' ";
                            // return $response;
                            return response($response['msg'], 402);

                            // // exit();
                        }
                    }
                /* jika route tidak ditemukan dalam list maka ijinkan ======================================================================*/
                // return $next($request);
                    // else{
                    //         return $next($request);
                    // }


            }
            // $log=new Log;
            // $log->users_id=  \Sentry::getUser()->id;
            // $log->group_id=  $group_id ;
            // $log->arr_id=  $value['arr_id'];
            // $log->table=  $table;
            // $log->action_name=  $config[$value['arr_id']]['name'];
            // $log->catatan=  'Gagal ';
            // $log->save();
            
            // return response('Unauthorized.', 401);
            return response('Group Akun Anda tidak memiliki akses aksi ini ', 401);

        }

        // All clear - we are good to move forward
        // return $next($request);
    }

}
