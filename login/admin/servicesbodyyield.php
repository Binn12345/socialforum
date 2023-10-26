<?php 
  include './components/dynamicyield.php';
  include 'function/data_display.php';
  include 'helpers/helper.php';
?>
<div class="pagetitle">
  <h1>Services</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.html">Home</a></li>
      <li class="breadcrumb-item">Services</li>
      <li class="breadcrumb-item active">User Accounts</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section">
  <div class="row">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title"></h5>
          <div class="row">
            <div class="col-xxl-2 col-xl-2">
              <label class="col-form-label">User Type</label>
            </div>
            <div class="col-xxl-8 col-xl-8">
                <select class="form-select" aria-label="Default select example" id="usertype">
                  <option selected="">- All Users -</option>
                  <option value="1">Superadmin</option>
                  <option value="3">Admin</option>
                  <option value="2">Student</option>
                </select>
            </div>
            <div class="col-xxl-2 col-xl-2">
              <button type="button" class="btn btn-primary" id="filter">
                 Filter
              </button> 
            </div>
          </div>
        </div>
      </div>
  </div>
</section>

<section class="section">
  <div class="row">
    <div class="col-lg-12">

      <div class="card">
        <div class="card-body">
          <h5 class="card-title"></h5>
          <!-- Large Modal -->
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#largeModal">
                Add User Account
          </button>
          <!-- Table with stripped rows -->
          <table id="myTable" class="display">
            <thead>
                <tr>
                    <th style="width: 5%; text-align: center">#</th>
                    <th>Username</th>
                    <th>Role</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
          </table>
          <!-- End Table with stripped rows -->
        </div>
      </div>

    </div>
  </div>
</section>

