<!--Page Name: about-us.php
	
    By: Ghaith Ali
    Student ID: 040994718
    Professor: Leanne Seaward
	  Client: Charlie Dazé 
    Prototype: 1
    Purpose: This page is display information regarding navigating the trans health system for users.
    Functions: Shows guide to navigating the trans health system.
 -->

<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="./trans-health.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=PT Sans|Ubuntu Condensed|Baloo 2">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/00cef6843f.js" crossorigin="anonymous"></script>
  <style>
    .active {
      background-color: #a1c3d1;
      border-radius: 5px;
      padding: 13px;
    }

    #navbarNavAltMarkup .navbar-nav a {
      font-size: 20px;
      padding-left: 30px;
      padding-right: 30px;
      color: black;
      font-family: PT Sans;
      font-style: bold;
      transition: all 0.2s ease;
      border-radius: 5px;
      padding: 13px;
    }

    #navbarNavAltMarkup .navbar-nav a:hover {
      color: white;
      background-color: #a1c3d1;
      border-radius: 5px;
    }

    .rainbow-box {
      text-align: center;
      color: white;
      font-family: Ubuntu Condensed;
      background: linear-gradient(90deg,
          #b39bc8 0%,
          #a1c3d1 200%);
      width: 100%;
      height: 200px;
      border-radius: 5px;
      font-family: Baloo 2;
    }

    body {
      background-color: #f0ebf4;
      margin: 0px;
      padding: 0px;
    }

    #footer {
      color: black;
      background-color: #a1c3d1;
      padding: 30px;
    }


    .logo img {
      position: absolute;
      top: 10px;
      left: 0px;
    }

    nav {
      margin-left: 160px;
    }

    .list-group-item {
      padding-left: 0;
    }
  </style>
</head>

<body>
  <header>
    <a class="logo" href="../index.php" style="padding: 0px"><img src="../assets/images/TOPlogo.gif" alt="Logo image"></img></a>
    <nav class="navbar navbar-expand-lg navbar-light bg-#f0ebf4">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          <a class="nav-item nav-link" href="../index.php">Home</a>
          <a class="nav-item nav-link active" href="./trans-health.php" style="color: white;">Navigating Trans Health</a>
          <a class="nav-item nav-link" href="./about-us.php">About Us</a>
          <a class="nav-item nav-link" href="./admin-login.php">Login (for Admins only)</a>
        </div>
      </div>
    </nav>
  </header>

  <main>
    <div class="rainbow-box jumbotron">
      <h1>Navigating Trans Health</h1>
      <p class="lead">Where you can find our guide to navigating the trans health system</p>
    </div>

    </br>
    <div class="container" style="width: 100% ;font-family: Ubuntu Condensed;">
      <div class="row">
        <div class="col-12">
          <div class="card bg-light text-black" style="height: calc(100% - 16px)">
            <div class="card-body">
              <h5 class="card-title">In Ontario: </h5>
              <p class="card-text">
              <ul>
                <li> There is no minimum age of consent/informed consent to accessing trans healthcare</li>
                <li>i.e. A trans youth can start puberty blockers and hormones with an informed
                  understanding of the effects, risks, and potential outcomes of treatment</li>
                <li>You do not need to be 16 to start hormone replacement therapy - there is no age
                  requirement for HRT</li>
                <li>You do not need to be on a hormone blocker before starting testosterone.</li>
                <li>You DO NOT need an EXAM of your chest or genitals BEFORE, DURING, OR AFTER HRT. </li>
                <ul>
                  <li>To start hormones, one just needs to complete blood work, and a routine
                    physical exam to establish baseline health statistics around your heart rate, blood
                    pressure, breathing, ear, nose, and throat, potentially weight and height (you can
                    always ask the doctor or nurse to not repeat your weight or height to you), and a
                    conversation regarding any other previous conditions (and how HRT might affect
                    them - i.e. eczema may worsen with T).</li>
                  <li>If the individual is intersex, they will also need information about the potential
                    effects on their body, which may differ from someone who is not intersex. Note -
                    intersex conditions are as common as red hair.</li>
                  <li>Doctors may say a physical exam is necessary to check for intersex conditions,
                    but this is false.</li>
                  <ul>
                    <li>a) Hormone levels will be checked through blood work.</li>
                    <li>b) A doctor can explain what to look out for with one's body to be aware
                      of the different effects hormones can have on an intersex body.
                    </li>
                    <li>c) Adults are not physically checked if they are intersex before starting
                      HRT. Children/youth do not need to show their bodies to doctors before
                      starting HRT.</li>
                  </ul>
                </ul>
                <li>You are entitled to your medical chart/records - this can be seen through online systems
                  such as Mychart, or you can request through your doctor's office and staff should
                  photocopy them for you</li>
              </ul>
              </p>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-12">
          <div class="card bg-light text-black" style="height: calc(100% - 16px)">
            <div class="card-body">
              <h5 class="card-title">Your General Practitioner (family doctor) can prescribe hormone blockers, and HRT, and/or
                refer you for gender-affirming surgery.</h5>
              <p class="card-text">
              <ul>
                <li>Many family doctors do not feel capable/comfortable taking care of trans children and
                  youth. Instead, they may refer them out to a Gender Clinic (CHEO, Sick Kids, etc.).</li>
                <li>You do not have to go to a gender clinic, you can also request to be referred to an
                  Endocrinologist (hormone doctor) instead.</li>
                <li>Try going with a friend, family member, or someone you trust from the community to
                  your appointment. Studies have shown medical professionals respect their patients more
                  with another person in the room. </li>
              </ul>
              </p>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-12">
          <div class="card bg-light text-black" style="height: calc(100% - 16px)">
            <div class="card-body">
              <h5 class="card-title">Tips for Hormones Blockers: </h5>
              <p class="card-text">
              <ul>
                <li>Do not need a blood test to start blockers, but it is a good idea to know where your body
                  is in relation to hormones and bone density.</li>
                <li>You do not need an exam of your chest or genitals.</li>
                <li>Some folks take Calcium and Vitamin D supplements to decrease the impact of blockers
                  and/or hormones on their bone density</li>
                <li>You do not need to start blockers before HRT, if you are starting Testosterone (T).</li>
                <li>For folks starting Estrogen (E), anti-androgen blockers are commonly taken to decrease the impact of T on the body.</li>
                <li>The effects of T are stronger than the effects of E.</li>
                <li>You can continue on blockers while transitioning through HRT</li>
                <li>Why would someone do this? There may be specific side effects from hormones they do
                  not want:</li>
                <ul>
                  <li>E.g.: While taking T, one can stay on Lupron to decrease the effects of increased
                    body hair and bottom growth, which are directly caused by T. Additionally, one
                    can start a DHT (dihydrotestosterone) blocker, such as Finasteride, before starting
                    T or after starting for similar reasoning</li>
                  <li>Note: Lupron is covered under OHIP+ if you (or your parents) do not have private
                    insurance. Finasteride is not likely to be covered, and costs around $120 for a 3-month supply.
                  </li>
                </ul>
              </ul>
              </p>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-12">
          <div class="card bg-light text-black" style="height: calc(100% - 16px)">
            <div class="card-body">
              <h5 class="card-title">Tips for Hormone Replacement Therapy (HRT): </h5>
              <p class="card-text">
              <ul>
                <li>There is no minimum age of consent, trans youth can begin HRT before age 16.</li>
                <li>Consent is only required by the patient (parental consent is not needed unless the
                  child/youth is deemed “not capable” by the physician to give informed consent).</li>
                <li>If this happens, ask for the doctor’s reasoning and what they would need to see in order
                  for you to be seen as “capable” of consenting</li>
                <li>Denial of healthcare is illegal, and withholding care is not a neutral option for trans
                  people/youth (Coleman et al., 2012 as cited in Pullen Sansfaçon, Medico, Riggs, Carlile,
                  & Suerich-Gulick, 2020)</li>
                <li>Options for taking hormones (both T and E) include injections, a topical gel, wearing a
                  patch, or taking a pill (most common w E). There are a few other options that aren’t as
                  readily available in Canada. For T, gel and patches will be more expensive than shots if
                  you do not have insurance. For E, creams are more expensive than pills, which are more
                  expensive than shots, but this difference is not as large (from our research).</li>
                <li>Each option has its own pros/cons for the individual, it’s important to know which
                  options you’ll have access to, and which one will work best for you personally.</li>
                <li>Numb your skin on your shot day if you have trouble with needles! Usually, topical</li>
                <li>lidocaine numbing cream takes about 1-2 hours to completely numb</li>
              </ul>
              </p>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-12">
          <div class="card bg-light text-black" style="height: calc(100% - 16px)">
            <div class="card-body">
              <h5 class="card-title">Tips for the Pharmacy: </h5>
              <p class="card-text">
              <ul>
                <li>If it's the first time you're picking up your new prescription, call ahead to let them know
                  you are coming to get it</li>
                <li>It is also a good idea to call ahead because there can be shortages of HRT meds at times
                  (common with T)</li>
                <li>For T, you cannot request a refill of the prescription yourself once its initial length has
                  been exhausted. Your doctor will give you a new prescription for each "round" (e.g. every
                  three months).</li>
                <li>This is because T is a "controlled substance", which can lead to difficulties at the
                  pharmacy</li>
                <li>Sometimes pharmacy techs are taken aback by the needle size required for drawing up T
                  (the injection is done with a smaller needle).</li>
                <ul>
                  <li>Asking your doctor for a prescription of the needle sizes might be helpful - you
                    don't need a prescription for needles, but pharmacy techs are more likely to give
                    you the needles without hassle this way.</li>
                  <li>MAX Ottawa also dispenses HRT needles for free through their Harm Reduction
                    program, if you don't wish to get them at the pharmacy.</li>
                </ul>
                <li>Pharmacists can give you your HRT shots if you don't want to do them yourself - you do
                  not need to go to your doctor/clinic each week.</li>
                <li>It is illegal for a pharmacy to deny you your prescription.</li>
                <ul>
                  <li>This includes denying a patient their prescription on the basis of a gender marker
                    issue. If there is an issue with your health file, your pharmacy should contact your
                    doctor directly to solve the issue</li>
                </ul>
                <li>Go with a person you trust who can advocate on your behalf to pick up your
                  prescriptions.</li>
                <li>HRT is covered under OHIP+ (provincial healthcare coverage for folks under age 25).</li>
                <ul>
                  <li>You may need to file an EAP (Exceptional Access Program) form to receive this coverage for HRT. Your doctor can file on your behalf.</li>
                  <li><a href="https://health.gov.on.ca/en/pro/programs/drugs/eap_mn.aspx">https://health.gov.on.ca/en/pro/programs/drugs/eap_mn.aspx</a></li>
                </ul>
              </ul>
              </p>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-12">
          <div class="card bg-light text-black" style="height: calc(100% - 16px)">
            <div class="card-body">
              <h5 class="card-title">Connect-Clinic</h5>
              <p class="card-text">
              <ul>
                <li>A virtual 'telemedicine' clinic, so all appointments and consultations with a doctor are
                  conducted online. The clinic is Ontario-based and offers medical consultations, advice,
                  and treatment specializing in trans healthcare, including HRT and surgical referrals. Their
                  waitlist is between 2-4 months at this time, which is a significant contrast to others in the
                  province (e.g. Trans Health Clinic for adults in Ottawa is currently 2 years)</li>
                <li>Referral from another doctor/agency isn't necessary to access the Connect-Clinic, but
                  they do accept referrals if you ever need a community member/organization to speak on
                  your behalf</li>
                <li> The website is available here: <a href="https://www.connect-clinic.com/"> https://www.connect-clinic.com/</a></li>
              </ul>
              </p>
            </div>
          </div>
        </div>
      </div>

    </div>
    </br>
  </main>
</body>
<footer id="footer">
  <div class="container">
    <p class="float-right">
      <a href="https://twitter.com/tenoaksproject?lang=en" style="color: inherit" target=”_blank”><i class="fa-brands fa-twitter-square"></i></a> &nbsp;
      <a href="https://www.instagram.com/tenoaksproject/?hl=en" style="color: inherit" target=”_blank”> <i class="fa-brands fa-instagram"></i></a> &nbsp;
      <a href="https://www.facebook.com/TenOaks/" style="color: inherit" target=”_blank”><i class="fa-brands fa-facebook-square"></i></a> &nbsp;
    </p>
    <p>Ten Oaks Link</p>
  </div>
</footer>

</html>