<?php
    include "process.php";

?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Update</title>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <link
      href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <link rel="stylesheet" href="prof.css" />
    <script nonce="a5882d12-cd0b-4bdb-8728-f301d7f97aa4">
      try {
        (function (w, d) {
          !(function (b, c, d, e) {
            b[d] = b[d] || {};
            b[d].executed = [];
            b.zaraz = { deferred: [], listeners: [] };
            b.zaraz.q = [];
            b.zaraz._f = function (f) {
              return async function () {
                var g = Array.prototype.slice.call(arguments);
                b.zaraz.q.push({ m: f, a: g });
              };
            };
            for (const h of ["track", "set", "debug"])
              b.zaraz[h] = b.zaraz._f(h);
            b.zaraz.init = () => {
              var i = c.getElementsByTagName(e)[0],
                j = c.createElement(e),
                k = c.getElementsByTagName("title")[0];
              k && (b[d].t = c.getElementsByTagName("title")[0].text);
              b[d].x = Math.random();
              b[d].w = b.screen.width;
              b[d].h = b.screen.height;
              b[d].j = b.innerHeight;
              b[d].e = b.innerWidth;
              b[d].l = b.location.href;
              b[d].r = c.referrer;
              b[d].k = b.screen.colorDepth;
              b[d].n = c.characterSet;
              b[d].o = new Date().getTimezoneOffset();
              if (b.dataLayer)
                for (const o of Object.entries(
                  Object.entries(dataLayer).reduce(
                    (p, q) => ({ ...p[1], ...q[1] }),
                    {}
                  )
                ))
                  zaraz.set(o[0], o[1], { scope: "page" });
              b[d].q = [];
              for (; b.zaraz.q.length; ) {
                const r = b.zaraz.q.shift();
                b[d].q.push(r);
              }
              j.defer = !0;
              for (const s of [localStorage, sessionStorage])
                Object.keys(s || {})
                  .filter((u) => u.startsWith("_zaraz_"))
                  .forEach((t) => {
                    try {
                      b[d]["z_" + t.slice(7)] = JSON.parse(s.getItem(t));
                    } catch {
                      b[d]["z_" + t.slice(7)] = s.getItem(t);
                    }
                  });
              j.referrerPolicy = "origin";
              j.src =
                "/cdn-cgi/zaraz/s.js?z=" +
                btoa(encodeURIComponent(JSON.stringify(b[d])));
              i.parentNode.insertBefore(j, i);
            };
            ["complete", "interactive"].includes(c.readyState)
              ? zaraz.init()
              : b.addEventListener("DOMContentLoaded", zaraz.init);
          })(w, d, "zarazData", "script");
        })(window, document);
      } catch (e) {
        throw (fetch("/cdn-cgi/zaraz/t"), e);
      }
    </script>
  </head>
  <body class="img js-fullheight" style="background-image: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url(images/bg_1.jpg);
  ">
    <section class="ftco-section">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-6 text-center mb-5">
            <h2 class="heading-section">Pinas Explore</h2>
          </div>
        </div>
        <div class="row justify-content-center">
          <div class="col-md-6 col-lg-4">
            <div class="login-wrap p-0">
              <h3 class="mb-4 text-center">Update your Account!</h3>
              <form action="process.php" class="signin-form" method="post">
              <div class="form-group">
                  <input
                    type="text"
                    name="Uname"
                    class="form-control"
                    placeholder="Name"
                    value="<?php echo $Name; ?>"
                    required
                  />
                </div>

                <div class="form-group">
                  <input
                    type="text"
                    name="Uemail";
                    class="form-control"
                    placeholder="Email"
                    value="<?php echo $email; ?>"
                    required
                  />
                </div>
                <div class="form-group">
                  <input
                    id="password-field"
                    type="password"
                    name="Upassword";
                    class="form-control"
                    placeholder="Password"
                    value="<?php echo $pass; ?>"
                    required
                  />
                </div><br>
                <div class="form-group">
                  <button
                    type="submit"
                    name="update"
                    class="form-control btn btn-primary submit px-3"
                  >
                   Update
                  </button>
                </div>
              </form>

              <br>
              <br>

            </div>
          </div>
        </div>
      </div>
    </section>
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <script
      defer
      src="https://static.cloudflareinsights.com/beacon.min.js/v84a3a4012de94ce1a686ba8c167c359c1696973893317"
      integrity="sha512-euoFGowhlaLqXsPWQ48qSkBSCFs3DPRyiwVu3FjR96cMPx+Fr+gpWRhIafcHwqwCqWS42RZhIudOvEI+Ckf6MA=="
      data-cf-beacon='{"rayId":"86e67a0828118d09","version":"2024.3.0","token":"cd0b4b3a733644fc843ef0b185f98241"}'
      crossorigin="anonymous"
    ></script>
  </body>
</html>
