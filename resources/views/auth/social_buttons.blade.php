<?php $class = "btn btn-block my-3 mr-2 flex justify-center align-center"; ?>

<div class="flex align-center">
    <a href="{{ url('auth/google') }}" class="btn-danger <?= $class ?>">
        <i class="fab fa-google"></i>
        <span>Google</span>
    </a>
    
    <a href="{{ url('auth/facebook') }}" class="btn-primary <?= $class ?>">
        <i class="fab fa-facebook"></i>
        <span>Facebook</span>
    </a>
    
    <a href="{{ url('auth/github') }}" class="btn-dark <?= $class ?>">
        <i class="fab fa-github"></i>
        <span>Github</span>
    </a>
</div>