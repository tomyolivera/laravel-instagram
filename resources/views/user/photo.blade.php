<img class="w-<?= $size ?> rounded-full" 
    src="{{ 
        strlen($photo) <= 25
        ? route('user.photo', ['filename' => $photo]) 
        : $photo
    }}" />