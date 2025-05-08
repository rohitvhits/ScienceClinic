<?php



namespace App\Providers;



use Illuminate\Support\ServiceProvider;

use App\Helpers\SubjectHelper;
use App\Models\OnlineTutoring;
use App\Models\PayClaimFormDetails;
use Illuminate\Support\Facades\URL;
use DB;

class AppServiceProvider extends ServiceProvider

{

    /**

     * Register any application services.

     *

     * @return void

     */

    public function register()

    {

        view()->composer('*', function ($view) {

            $query = SubjectHelper::getSubjectList();

            foreach ($query as $val) {

                $getDetails = SubjectHelper::getParentList($val->id);

                if(count($getDetails)>0){

                    foreach($getDetails as $subcate){

                        $subcate->sub_caregory_url = URL::to('/') . '/sub-subject/' . sha1($subcate->id);

                    }

                }else{

                    $val->caregory_url = URL::to('/').'/subject/'.sha1($val->id);

                }

                $val->subcategory = $getDetails;

            }

            $data['response_menu'] = $query;
            $data['online_tutorigData'] = OnlineTutoring::whereNUll('deleted_at')->get();
            $data['allSubjects'] = SubjectHelper::getAllSubjectList();
            foreach ($data['allSubjects'] as $val) {
                $val->url = URL::to('/') . '/find-tutor/' . rtrim(strtr(base64_encode($val->id), '+/', '-_'), '=');
            }

            $getSids=PayClaimFormDetails::select('subject_id', DB::raw('COUNT(id) as total'))
            ->groupBy('subject_id')
            ->orderByDesc('total')
            ->get()->take(20);
            $allsubject_list=json_decode(json_encode($data['allSubjects']), true);
            $getSids=json_decode(json_encode($getSids), true);
            $getSids = array_column($getSids, 'subject_id');
            $filteredData = array_filter($allsubject_list, function ($item) use ($getSids) {
                return in_array($item['id'], $getSids);
            });
            $data['popularSubs'] = array_values($filteredData);
            $view->with($data);

        });

        

       

    }



    /**

     * Bootstrap any application services.

     *

     * @return void

     */

    public function boot()

    {

        //

    }

}

