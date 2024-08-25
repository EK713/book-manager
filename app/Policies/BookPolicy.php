<?php

    namespace App\Policies;

    use App\Models\Book;
    use App\Models\User;
    use Illuminate\Auth\Access\HandlesAuthorization;
    
    class BookPolicy
    {
        use HandlesAuthorization;
    
        // Ensure the user can update their own book
        public function update(User $user, Book $book)
        {
            return $user->id === $book->user_id;
        }
    
        public function edit(User $user, Book $book)
        {
            return $user->id === $book->user_id;
        }

        // Ensure the user can delete their own book
        public function delete(User $user, Book $book)
        {
            return $user->id === $book->user_id;
        }
    }
    

