<?php
namespace App\Http\Controllers\Mentors;
use App\Http\Controllers\Controller;
use App\Models\Mentor;
use App\Services\MainServices;
use Illuminate\Http\Request;
use App\Services\MentorServices;
use App\Models\Country;
use App\Models\Issue;
use App\Models\Field;
class ProfileController extends Controller
{
    public function index()
    {
        $data=MentorServices::getMyProfileInfo();
        $country=Country::orderBy('title')->get();
        $issues=Issue::orderBy('title')->get();
        $fields=Field::orderBy('title')->get();
        return view("registration.mentor",[
            "data"=>$data,
            "country"=>$country,
            "issues"=>$issues,
            "fields"=>$fields
        ]);
    }
    public function update(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|string',
            'user_id' => 'numeric',
            'price' => 'numeric|required',
            'country.data.id' => 'required',
            'linkedin' => 'required|string',
            'experience' => 'required|string',
            'which.field.id' => 'required|numeric',
            'which.issue' => 'required|array',
        ]);
        if (MainServices::checkIfProfileCompleted($request->input('user_id'), Mentor::class)) {
            return MentorServices::updateMyProfileInfo($request);
        }else{
            return MentorServices::createProfile($request);
        }
    }
}
