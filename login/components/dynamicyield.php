<div class="modal fade" id="largeModal" tabindex="-1">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">User Account</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
              <form class="row g-3 needs-validation" novalidate id="create">
                <div class="col-12">
                  <select class="form-select" aria-label="Default select example" name="userrole">
                    <option selected="">- All Users -</option>
                    <option value="1">Superadmin</option>
                    <option value="3">Admin</option>
                    <option value="2">Student</option>
                  </select>
                </div>
                <div class="col-12">
                  <div class="form-floating mb-3">
                      <input type="text" class="form-control" placeholder="name@example.com" name="addusername" id='addusername'>
                      <label for="floatingInput">Username</label>
                  </div>
                </div>
                <hr>
                <p>
                  Your password should be minimum of 8 characters in alpha-numeric with lowercase and uppercase format with special characters.
                </P>
                <div class="col-12">
                  <div class="form-floating mb-3">
                      <input type="password" class="form-control" placeholder="name@example.com" name="newpassword" id='newpassword'>
                      <label for="floatingInput">New Password</label>
                  </div>
                </div>
                <div class="col-12">
                  <div class="form-floating mb-3">
                      <input type="password" class="form-control" placeholder="name@example.com" name="confirmpassword" id='confirmpassword'>
                      <label for="floatingInput">Confirm Password</label>
                  </div>
                </div>
              </form>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id='save'>Save Changes</button>
      </div>
    </div>
  </div>
</div><!-- End Large Modal-->