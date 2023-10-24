<?php include './modal/dynamicyield.php' ?>

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
                <select class="form-select" aria-label="Default select example">
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
          <table class="table datatable" id="myTable">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Position</th>
                <th scope="col">Age</th>
                <th scope="col">Start Date</th>
              </tr>
            </thead>
            <!-- <tbody>
              <tr>
                <th scope="row">1</th>
                <td>Brandon Jacob</td>
                <td>Designer</td>
                <td>28</td>
                <td>2016-05-25</td>
              </tr>
              <tr>
                <th scope="row">2</th>
                <td>Bridie Kessler</td>
                <td>Developer</td>
                <td>35</td>
                <td>2014-12-05</td>
              </tr>
              <tr>
                <th scope="row">3</th>
                <td>Ashleigh Langosh</td>
                <td>Finance</td>
                <td>45</td>
                <td>2011-08-12</td>
              </tr>
              <tr>
                <th scope="row">4</th>
                <td>Angus Grady</td>
                <td>HR</td>
                <td>34</td>
                <td>2012-06-11</td>
              </tr>
              <tr>
                <th scope="row">5</th>
                <td>Raheem Lehner</td>
                <td>Dynamic Division Officer</td>
                <td>47</td>
                <td>2011-04-19</td>
              </tr>
            </tbody> -->
          </table>
       

          <!-- End Table with stripped rows -->

        </div>
      </div>

    </div>
  </div>
</section>

