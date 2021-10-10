
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-md-6  mx-auto">
        <div class="card shadow-2-strong" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">

            <h3 class="mb-5">Sign in</h3>
            <form method='POST' action='sign-in'>
            <div class="form-outline mb-4">
              <input type="email" id="typeEmailX" class="form-control form-control-lg" name='email' />
              <label class="form-label" for="typeEmailX">Email</label>
            </div>

            <div class="form-outline mb-4">
              <input type="password" id="typePasswordX" class="form-control form-control-lg" name='password' />
              <label class="form-label" for="typePasswordX">Password</label>
            </div>

            <!-- Checkbox -->
            <div class="form-check d-flex justify-content-start mb-4">
              <input
                class="form-check-input"
                type="checkbox"
                value=""
                id="form1Example3"
              />
              <label class="form-check-label" for="form1Example3"> Remember password </label>
            </div>

            <button class="btn btn-primary btn-lg btn-block" type="submit">Login</button>

</form>
          </div>
        </div>
      </div>
    </div>
  </div>
