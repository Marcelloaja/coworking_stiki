<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Daftar</title>
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}" />
  </head>
  <body>
    <section class="container">
      <div class="image-section">
        <div class="image-wrapper">
          <!-- <img src="img/Bg.png" alt="" /> -->
        </div>
      </div>

      <div class="form-section">
        <div class="form-wrapper">
          <div class="container text-center logo_row">
            <div class="row align-items-start" id="logo_row">
              <div class="col">
                <img src="{{ asset('assets/img/logo_perpus.png') }}" class="logo_row2" alt="" />
              </div>
              <div class="col">
                <img src="{{ asset('assets/img/logo_gisua.png') }}" class="logo_row2" alt="" />
              </div>
            </div>
          </div>

          <h2>Daftar</h2>
          <!-- <p>Enter your credentials to access your account. 👋🏻</p> -->
          <br>

          <div class="input-container">
            <form method="POST" action="{{ url('register/save') }}">
                @csrf
                <div class="form-group">
                  <!-- <label for="nama">Nama Lengkap</label> -->
                  <input
                    type="text"
                    name="nama"
                    id="nama"
                    class="form-control"
                    placeholder="Nama Lengkap"
                    autocomplete="off"
                    required
                  />
                </div>
                <div class="form-group">
                  <!-- <label for="nrp">NRP</label> -->
                  <input
                    type="text"
                    name="nrp"
                    id="nrp"
                    class="form-control"
                    placeholder="NRP"
                    autocomplete="off"
                    required
                  />
                </div>
                <div class="form-group">
                  <!-- <label for="email" class="sr-only">Email</label> -->
                  <input
                    type="email"
                    name="email"
                    id="email"
                    class="form-control"
                    placeholder="Email"
                    autocomplete="off"
                    required
                  />
                </div>
                <div class="form-group">
                  <!-- <label for="skill">SKILL</label> -->
                  <input
                    type="text"
                    name="skill"
                    id="skill"
                    class="form-control"
                    placeholder="Skill"
                    autocomplete="off"
                    required
                  />
                </div>
              <div>
                <br />
                <button class="login-btn" type="submit">Selanjutnya</button>
                <br />
                <center><hr /></center>
              </div>
            </form>
          </div>          
        </div>
      </div>
    </section>
  </body>
</html>
