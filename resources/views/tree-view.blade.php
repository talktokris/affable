@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Recent Users</div>
                <div class="card-body">
                    <div class="tree">
                   <?php // echo $htmlData ;

echo '<ul><li><a href="'. url('/admin/user/view/').'/'.base64_encode($id).'">'.$id.'</a>';


$members = App\Models\Member::where('upline', '=', $id)->get()->toArray();
if($members>1){

    echo '<ul>';
        foreach ($members as  $one) {
           echo '<li><a href="'. url('/admin/user/view/').'/'.base64_encode($one['user_id']).'">'.$one['user_id'].'</a>';

                // Level 1 Start
                $membersTwo = App\Models\Member::where('upline', '=', $one['user_id'])->get()->toArray();
                if($membersTwo>1){

                    echo '<ul>';
                        foreach ($membersTwo as  $two) {
                            echo '<li><a href="'. url('/admin/user/view/').'/'.base64_encode($two['user_id']).'">'.$two['user_id'].'</a>';

                                // Level 2  Start 

                                $membersThree = App\Models\Member::where('upline', '=', $two['user_id'])->get()->toArray();
                                if($membersThree>1){

                                    echo '<ul>';
                                        foreach ($membersThree as  $three) {
                                            echo '<li><a href="'. url('/admin/user/view/').'/'.base64_encode($three['user_id']).'">'.$three['user_id'].'</a>';

                                                 // Level 3  Start 
                                                $membersFour = App\Models\Member::where('upline', '=', $three['user_id'])->get()->toArray();
                                                if($membersFour>1){

                                                    echo '<ul>';
                                                        foreach ($membersFour as  $four) {
                                                            echo '<li><a href="'. url('/admin/user/view/').'/'.base64_encode($four['user_id']).'">'.$four['user_id'].'</a>';

                                                                        // Level 4  Start 
                                                                        $membersFive = App\Models\Member::where('upline', '=', $four['user_id'])->get()->toArray();
                                                                        if($membersFive>1){

                                                                            echo '<ul>';
                                                                                foreach ($membersFive as  $five) {
                                                                                    echo '<li><a href="'. url('/admin/user/view/').'/'.base64_encode($five['user_id']).'">'.$five['user_id'].'</a>';

                                                                                               // Level 5  Start 
                                                                                                $membersSix = App\Models\Member::where('upline', '=', $five['user_id'])->get()->toArray();
                                                                                                if($membersSix>1){

                                                                                                    echo '<ul>';
                                                                                                        foreach ($membersSix as  $six) {
                                                                                                            echo '<li><a href="'. url('/admin/user/view/').'/'.base64_encode($six['user_id']).'">'.$six['user_id'].'</a>';
                                                                                                                
                                                                                                            echo '</li>';
                                                                                                        }
                                                                                                    echo '</ul>';

                                                                                                }
                                                                                                // Level 5  End 
                                                                                        
                                                                                    echo '</li>';
                                                                                }
                                                                            echo '</ul>';

                                                                        }
                                                                        // Level 4  End 
                                                                
                                                            echo '</li>';
                                                        }
                                                    echo '</ul>';

                                                }
                                                 // Level 3  End 

                                            echo '</li>';
                                        }
                                    echo '</ul>';

                                }
                                // Level 2  End 
                            echo '</li>';
                        }
                    echo '</ul>';

                }
                // Level 1 End
            
            echo '</li>';
        }
    echo '</ul>';

}


echo "</li></ul>";

/*
echo "<pre>";
print_r($members);
echo "</pre>";
*/

?>
                   
                   
                    </div>
                    <?php /*
                <div class="tree">
                    <ul>
                        <li>
                            <a href="#">Parent</a>
                            <ul>
                                <li>
                                    <a href="#">Child</a>
                                    <ul>
                                        <li>
                                            <a href="#">Grand Child</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">Child</a>
                                    <ul>
                                        <li><a href="#">Grand Child</a></li>
                                        <li>
                                            <a href="#">Grand Child</a>
                                            <ul>
                                                <li>
                                                    <a href="#">Great Grand Child</a>
                                                </li>
                                                <li>
                                                    <a href="#">Great Grand Child</a>
                                                </li>
                                                <li>
                                                    <a href="#">Great Grand Child</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a href="#">Grand Child</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
               */?>
            </div>
            </div>
        </div>
    </div>
</div>
@endsection
