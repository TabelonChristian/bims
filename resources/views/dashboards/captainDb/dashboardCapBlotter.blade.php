@include('layouts.head')

<body>

  <!-- ======= Header ======= -->
    @include('layouts.header')
  <!-- End Header -->

  <!-- ======= Sidebar ======= -->
    @include('layouts.sidebar')
  <!-- End Sidebar -->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Blotter</h1>
    </div><!-- End Page Title -->

    <div class="card">
      <div class="card-body">

        <!-- Table with stripped rows -->
        <table class="table table-striped datatable">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Full Name(Complainants)</th>
              <th scope="col">Full Name(Respondents)</th>
              <th scope="col">Date</th>
              <th scope="col">Status</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
            <tbody>
                @foreach($complaint as $complaints)
                    @php
                        // Calculate age
                        $birthdate = \Carbon\Carbon::parse($complaints->res_bdate);
                        $age = $birthdate->age;
                        // Concatenate full name
                        $fullName = $complaints->res_fname . ' ' . $complaints->res_mname . ' ' . $complaints->res_lname;
                        if ($complaints->res_suffix !== 'null') {
                            $fullName .= ' ' . $complaints->res_suffix;
                        }
                    @endphp
                    <tr>
                        <td>{{ $complaints->blotter_id }}</td>
                        <td>{{ $fullName }}</td>
                        <td>{{ $complaints->blotter_respondents }}</td>
                        <td>{{ $complaints->blotter_complaintMade }}</td>
                        <td>{{ $complaints->blotter_status }}</td>
                        <td>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ExtralargeModal" data-type="blotter" data-id="{{ $complaints->blotter_id }}">View</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <!-- End Table with stripped rows -->

      </div>
    </div>

<!-- Modal -->
<div class="modal fade" id="ExtralargeModal" tabindex="-1">
    <div class="modal-dialog modal-xl">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title">Barangay Clearance Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-lg-2 col-md-4 label">Transaction Code:</div>
                <div class="col-lg-9 col-md-8" id="transactionCode"></div>
            </div>

            <div class="row">
                <div class="col-lg-2 col-md-4 label">Respondents:</div>
                <div class="col-lg-9 col-md-8" id="repondents"></div>
            </div>

            <div class="row">
                <div class="col-lg-2 col-md-4 label">For:</div>
                <div class="col-lg-9 col-md-8" id="brgyFor"></div>
            </div>

            <div class="row">
                <div class="col-lg-2 col-md-4 label">Barangay Case No.:</div>
                <div class="col-lg-9 col-md-8" id="brgyCN"></div>
            </div>

            <div class="row">
                <div class="col-lg-2 col-md-4 label">Complaint:</div>
                <div class="col-lg-9 col-md-8" id="complaint"></div>
            </div>

            <div class="row">
                <div class="col-lg-2 col-md-4 label">Resolution:</div>
                <div class="col-lg-9 col-md-8" id="resolution"></div>
            </div>

            <div class="row">
                <div class="col-lg-2 col-md-4 label">Complaint Made:</div>
                <div class="col-lg-9 col-md-8" id="complaintMade"></div>
            </div>

            <div class="row">
                <div class="col-lg-2 col-md-4 label">Filed Date:</div>
                <div class="col-lg-9 col-md-8" id="filedDate"></div>
            </div>

            <div class="row">
                <div class="col-lg-2 col-md-4 label">Status:</div>
                <div class="col-lg-9 col-md-8" id="status"></div>
            </div>

            <div class="row">
                <div class="col-lg-2 col-md-4 label">Reason:</div>
                <div class="col-lg-9 col-md-8" id="reason"></div>
            </div>

            <hr>
            <h5 class="modal-title">Personal Details</h5>
            <hr>

            <div class="row">
                <div class="col-lg-2 col-md-4 label">Full Name:</div>
                <div class="col-lg-9 col-md-8" id="fullName"></div>
            </div>

            <div class="row">
                <div class="col-lg-2 col-md-4 label">Place Of Birth:</div>
                <div class="col-lg-9 col-md-8" id="placeOfBirth"></div>
            </div>

            <div class="row">
                <div class="col-lg-2 col-md-4 label">BirthDate:</div>
                <div class="col-lg-9 col-md-8" id="birthDate"></div>
            </div>

            <div class="row">
                <div class="col-lg-2 col-md-4 label">Age:</div>
                <div class="col-lg-9 col-md-8" id="age"></div>
            </div>

            <div class="row">
                <div class="col-lg-2 col-md-4 label">Civil Status:</div>
                <div class="col-lg-9 col-md-8" id="civilStatus"></div>
            </div>

            <div class="row">
                <div class="col-lg-2 col-md-4 label">Sex:</div>
                <div class="col-lg-9 col-md-8" id="sex"></div>
            </div>

            <div class="row">
                <div class="col-lg-2 col-md-4 label">Purok:</div>
                <div class="col-lg-9 col-md-8" id="purok"></div>
            </div>

            <div class="row">
                <div class="col-lg-2 col-md-4 label">Voter's Status:</div>
                <div class="col-lg-9 col-md-8" id="votersStatus"></div>
            </div>

            <div class="row">
                <div class="col-lg-2 col-md-4 label">Email Address:</div>
                <div class="col-lg-9 col-md-8" id="email"></div>
            </div>

            <div class="row">
                <div class="col-lg-2 col-md-4 label">Contact Number:</div>
                <div class="col-lg-9 col-md-8" id="contactNumber"></div>
            </div>

            <div class="row">
                <div class="col-lg-2 col-md-4 label">Citizenship:</div>
                <div class="col-lg-9 col-md-8" id="citizenship"></div>
            </div>

            <div class="row">
                <div class="col-lg-2 col-md-4 label">Address:</div>
                <div class="col-lg-9 col-md-8" id="address"></div>
            </div>

            <div class="row">
                <div class="col-lg-2 col-md-4 label">House Hold Number:</div>
                <div class="col-lg-9 col-md-8" id="houseHoldNumber"></div>
            </div>

            <div class="row">
                <div class="col-lg-2 col-md-4 label">Occupation:</div>
                <div class="col-lg-9 col-md-8" id="occupation"></div>
            </div>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
    </div>
    </div>
</div><!-- End Extra Large Modal-->

  </main><!-- End #main -->

  @include('layouts.footer')
</body>

</html>