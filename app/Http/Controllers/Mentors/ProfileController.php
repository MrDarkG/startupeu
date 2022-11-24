<?php
namespace App\Http\Controllers\Mentors;
use App\Http\Controllers\Controller;
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
            'name' => 'required',
            'linkedin' => 'required',
            'image' => 'required',
            'experience' => 'required',
            'which.field.id' => 'required|numeric',
            'which.issue' => 'required',
        ]);
        if (MentorServices::checkIfMentorHaveProfileCompleted()) {
            return MentorServices::updateMyProfileInfo($request);
        }
        else{
            return MentorServices::createProfile($request);
        }
    }


}
