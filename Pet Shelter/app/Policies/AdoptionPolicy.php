<?php

namespace App\Policies;

use App\Models\Adoption;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

/*
|-----------------------------------------------------------------------
| Task 1 Authorization. 
| You can use to policy for authorize adoptions
|-----------------------------------------------------------------------
*/

class AdoptionPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
    public function adopt(User $user, Adoption $adoption){#User $user, Adoption $adoption
        return $adoption->listed_by !== $user->id;  #$adoption->id;
        #if($request->user()->can('adopt', $adoption)){
            #abort(403);
        #}
    }
}
