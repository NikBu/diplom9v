<!-- The modal -->
<div id="{{ $modalId }}" class="modal" style="display: block;">
  <div class="modal-content">
      <span class="close">&times;</span>
      <h2>{{ $modalTitle }}</h2>
      <p>{{ $modalContent }}</p>
  </div>
</div>
<style>
  /* Modal styles */
 .modal {
    position: fixed;
    z-index: 1;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgba(0,0,0,0.4);
    display: none;
  }

 .modal-content {
    background-color: #fefefe;
    margin: 15% auto;
    padding: 20px;
    border: 1px solid #888;
    width: 80%;
    max-width: 500px;
  }

 .close {
    color: #aaaaaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
  }

 .close:hover,
 .close:focus {
    color: #000;
    text-decoration: none;
    cursor: pointer;
  }
</style>

<script>
  // Get the modal
  var modal = document.getElementById("{{ $modalId }}");


  // Get the <span> element that closes the modal
  var span = document.getElementsByClassName("close")[0];

  // When the user clicks on <span> (x), close the modal
  span.onclick = function() {
      modal.style.display = "none";
  }

  // When the user clicks anywhere outside of the modal, close it
  window.onclick = function(event) {
      if (event.target == modal) {
          modal.style.display = "none";
      }
  }
</script>