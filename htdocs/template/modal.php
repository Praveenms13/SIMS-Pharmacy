<?php
try{
    if (Session::get('_redirectInfo') == "/modal.php"){
        $redirectPage = explode("/", Session::get('_redirectInfo'))[1];
        $redirectPage = explode(".php", $redirectPage)[0];
        Session::delete('_redirectInfo');
        usersession::dispError("Redirect Info", "Successfully redirected to " . $redirectPage . " Page");
    } else {
        usersession::dispError("Info", "Modal Page !!");
    }
} catch (Exception $e){
    usersession::dispError("Notification Error", $e->getMessage());
}
?>

<h1>Hello world</h1>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Launch demo modal...
</button>

<button type="button" class="btn btn-primary" id="FetchModal">
    Fetch new modal
</button>

<button type="button" class="btn btn-primary" id="FetchToast">
    Show live toast
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                This modal is loaded from Modal file
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
<textarea name="" id="text-box" cols="30" rows="10">

</textarea>

<br>