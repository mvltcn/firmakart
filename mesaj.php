<?php
echo    '
<div class="toast-container position-absolute top-0 start-50 translate-middle-x">

    <div class="toast show align-items-center" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
             <div class="toast-body">
             ' .$_GET["mesaj"].'
            </div>
             <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
    </div>


</div>

';
