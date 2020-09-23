<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\Quote;

class QuotePolicy
{
    use HandlesAuthorization;

   public function update(User $user, Quote $quote)
   {
    //    dd($user);
    //    dd($user->ownsQuote($quote));
       return $user->ownsQuote($quote);
   }

   public function delete(User $user, Quote $quote)
   {
    //    dd($user);
    //    dd($user->ownsQuote($quote));
       return $user->ownsQuote($quote);
   }
}
