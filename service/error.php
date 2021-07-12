<?php
function showError($message)
{
  echo
  "<div class=\"form-group mb-4\">
  <div class=\"alert alert-danger\" role=\"alert\">
  $message
  </div>
  </div>";
}

function showMessage($color, $message)
{
  echo "<div class=\"alert alert-$color alert-dismissible fade show\" role=\"alert\">
  <strong>$message</strong>
  <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
    <span aria-hidden=\"true\">&times;</span>
  </button>
</div>";
}
