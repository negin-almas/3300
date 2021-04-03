<?php
$name    = isset($_POST['name']) ? $_POST['name'] : null;
$phone   = isset($_POST['phone']) ? $_POST['phone'] : null;
$email   = isset($_POST['email']) ? $_POST['email'] : null;
$message = isset($_POST['message']) ? $_POST['message'] : null;

if (!is_null($name) && (!is_null($phone) || !is_null($email)) && !is_null($message)) {
	$msg = '<meta charset="UTF-8">';
	$msg .= '<p>نام : ' . $name . '</p>';
	$msg .= '<p>تلفن : ' . $phone . '</p>';
	$msg .= '<p>ایمیل : ' . $email . '</p>';
	$msg .= '<p>متن : ' . $message . '</p>';
	$msg = mb_convert_encoding($msg, "UTF-8");
	require_once 'phpmailer/PHPMailerAutoload.php';
	$mail = new PHPMailer;
	$mail->isSMTP();
	$mail->Host       = 'mail.neginmail.ir';
	$mail->SMTPAuth   = true;
	$mail->Username   = 'info@3300.ir';
	$mail->Password   = 'Negin1404';
	$mail->SMTPSecure = 'tls';
	$mail->Port       = 25;
	$mail->From       = 'info@negincp.ir';
	$mail->FromName   = 'Contact Request';
	$mail->addAddress('info@3300.ir', 'User');
	$mail->isHTML(true);
	$mail->Subject = 'Message From 3300.ir';
	$mail->Body    = $msg;
	$contactSave   = $mail->send();
}
?>
<!DOCTYPE html>
<html>
<head lang="fa">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible"
	      content="IE=edge">
	<meta name="viewport"
	      content="width=device-width, initial-scale=1">
	<title>نگین ارتباط - خدمات ارزش افزوده مبتنی بر پیامک</title>

	<link href="css/bootstrap-arabic.min.css"
	      rel="stylesheet">
	<link rel="stylesheet"
	      href="css/bootstrap-arabic-theme.css"/>
	<link href="css/font-awesome.min.css"
	      rel="stylesheet">
	<link href="css/application.css"
	      rel="stylesheet">

	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
	<script src='https://www.google.com/recaptcha/api.js'></script>
</head>
<body>
<nav class="nav-container navbar"
     role="navigation">
	<div class="navbar-header">
		<button type="button"
		        class="navbar-toggle collapsed"
		        data-toggle="collapse"
		        data-target="#navbar-top">
			<span class="sr-only">Toggle navigation</span>
			<span class="fa fa-bars"></span>
		</button>
	</div>
	<div class="collapse navbar-collapse"
	     id="navbar-top">
		<ul class="nav navbar-nav">
			<li class="active">
				<a href="#home"
				   class="page-scroll">خانه
				</a>
			</li>
			<li>
				<a href="#traffic"
				   class="page-scroll">تامین ترافیک
				</a>
			</li>
			<li>
				<a href="#panel"
				   class="page-scroll">سامانه ها
				</a>
			</li>
			<li>
				<a href="#webservice"
				   class="page-scroll">وب سرویس
				</a>
			</li>
			<li>
				<a href="#bulk"
				   class="page-scroll">ارسال تبلیغاتی
				</a>
			</li>
			<li>
				<a href="#about"
				   class="page-scroll">نگین ارتباط
				</a>
			</li>
			<li>
				<a href="#blog"
				   class="page-scroll">اخبار و وبلاگ
				</a>
			</li>
			<li>
				<a href="#contact"
				   class="page-scroll">تماس با ما
				</a>
			</li>
		</ul>
	</div>
</nav>
<section id="home">
	<div class="center-container">
		<div class="center-field">
			<img class="img-responsive"
			     id="logo"
			     src="images/logo.png"
			     alt="نگین ارتباط"/>
			<div class="tel">تلفن تماس <span>٣٢٢٩٩٠۵٠-٠۵١</span></div>
			<a class="btn btn-login"
			   href="http://sms.3300.ir"
			   target="_blank">ورود به سامانه پیامک نگین
			</a>
			<!--<a class="btn btn-register"
			   disabled="disabled"
			   href="#">ثبت نام
			</a>-->

			<p>
				<button type="button"
				        data-toggle="modal"
				        data-target="#login"
				        class="btn-link">
					<i class="fa fa-globe"></i>
					ورود به دیگر سامانه ها
				</button>
			</p>

			<p>
				<a href="documents.html"
				   class="btn-link">
					<i class="fa fa-file-text"></i>
					مستندات فروش
				</a>
			</p>

			<div class="go-down">
				<span class="fa fa-angle-down"></span>
			</div>
		</div>
	</div>
</section>
<section id="traffic">
	<div class="center-container">
		<div class="center-field">
			<div class="container">
				<h1>تامین ترافیک</h1>

				<p></p>

				<div class="row">
					<div class="col-lg-4">
						<div class="well well-sm">
							<h2>خطوط ٣٠٠٠</h2>
							<ul>
								<li>امکان دریافت سر شماره<br>(رزرو زیر شماره برای مشتری)</li>
								<li>پشتیبانی فنی مناسب از طرف مبدا<br>(شرکت مگفا)</li>
								<li>اعتبار و امنیت بالا<br>(توصیه برای سازمانی دولتی)</li>
								<li>ارائه شماره منطبق با تلفن های ٥ رقمی</li>
								<li>زمان کوتاه تحویل شماره</li>
							</ul>
						</div>
					</div>
					<div class="col-lg-4">
						<div class="well well-sm">
							<h2>خطوط ٥٠٠٠</h2>
							<ul>
								<li>عدم محدودیت سرشماره</li>
								<li>تعرفه پایین تر نسبت به سایر شماره ها</li>
								<li>خدمات متنوع ارسال تبلیغاتی</li>
							</ul>
						</div>
					</div>
					<div class="col-lg-4">
						<div class="well well-sm">
							<h2>خطوط ١٠٠٠</h2>
							<ul>
								<li>عدم محدودیت سرشماره</li>
								<li>امکان فعال سازی شماره منطبق با شماره همراه</li>
								<li> تفاوت تعرفه ارسال به مشترکین همراه اول و سایر اپراتورها<br>(ایرانسل، تالیا،..)</li>
							</ul>
						</div>
					</div>
				</div>
				<a href="documents.html"
				   class="btn btn-warning btn-lg">اطلاعات بیشتر و قیمت ها
				</a>
			</div>
		</div>
	</div>
</section>
<section id="panel">
	<div class="center-container">
		<div class="center-field">
			<div class="container">
				<h1>سامانه پیامک نگین</h1>

				<p>سامانه پیامک نگین، نرم افزاری جهت ارسال و دریافت پیامک بر بستر وب می باشد که با اتصال به پرت های
				   ارتباطی
				   تامین
				   کنندگان ترافیک پیامک، امکان ارسال دو طرفه از مخاطب به شبکه GSM و از شبکه GSM به مخاطب را فراهم می
				   کند. این سامانه با ارائه خدمات ارزش افزوده بر روی ارسال و دریافت پیامک، طیف گسترده ای از خدمات بر
				   بستر
				   پیامک را
				   میسر
				   می نماید.
				</p>

				<div class="row">
					<div id="panel-features"
					     class="carousel slide"
					     data-ride="carousel">
						<!-- Indicators -->
						<ol class="carousel-indicators">
							<li data-target="#panel-features"
							    data-slide-to="0"
							    class="active"></li>
							<li data-target="#panel-features"
							    data-slide-to="1"></li>
							<li data-target="#panel-features"
							    data-slide-to="2"></li>
							<li data-target="#panel-features"
							    data-slide-to="3"></li>
							<li data-target="#panel-features"
							    data-slide-to="4"></li>
						</ol>
						<div class="carousel-inner"
						     role="listbox">
							<div class="item active">
								<div class="row">
									<div class="col-lg-12">
										<h2>ارسال و دریافت از چند شماره</h2>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-9">
										<p>در صورتی که شما چند شماره داشته باشید می توانید آنها را توسط سامانه
										   پیامک نگین
										   استفاده کنید، به عنوان مثال ممکن است شما دو شماره تبلیغاتی و یک
										   شماره
										   خدماتی داشته
										   باشید؛ شما ضمن مشاهده پیامک های دریافتی هر دو سرشماره، به هنگام
										   ارسال
										   می توانید تعیین
										   کنید پیامک شما با کدام شماره ارسال شود.
										</p>
									</div>
									<div class="col-lg-3">
										<img class="img-responsive"
										     src="images/connector.png"
										     alt=""/>
									</div>
								</div>
							</div>
							<div class="item">
								<div class="row">
									<div class="col-lg-12">
										<h2>ارسال زمان دار، مناسبتی و دوره ای</h2>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-9">
										<p>ارسال های زمان دار از کاربردی ترین امکانات سامانه می باشد که در سه قالب کلی
										   عرضه می
										   شود:
										</p>

										<p><b>ارسال زمان دار:</b> در این ارسال، شما می توانید زمانی در آینده را جهت
										                          ارسال پیامک
										                          خود تنظیم کنید، تا پیامک شما در زمان مقرر ارسال شود.
										</p>

										<p><b>ارسال مناسبتی:</b> ممکن است قصد داشته باشید مخاطبین شما در روز معینی پیامک
										                         دریافت
										                         کنند، به عنوان مثال شنبه هر هفته
										</p>

										<p><b>ارسال دوره ای:</b> این ارسال برای تبریک سال روز تولد، سالگرد ازدواج و
										                         موارد مشابه
										                         کاربر دارد.
										</p>
									</div>
									<div class="col-lg-3">
										<img class="img-responsive"
										     src="images/rasel.png"
										     alt=""/>
									</div>
								</div>
							</div>
							<div class="item">
								<div class="row">
									<div class="col-lg-12">
										<h2>ارسال پویا (نظیر به نظیر و متغییر)</h2>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-9">
										<p>یکی از راه های افزایش جذابیت پیامک، درج نام مخاطب در آن است، به واسطه این
										   سرویس می
										   توانید متغیرهایی چون نام و نام خانوادگی (یا برخی متغییرهای دلخواه) در متن خود
										   داشته
										   باشید
										</p>
									</div>
									<div class="col-lg-3">
										<img class="img-responsive"
										     src="images/connector.png"
										     alt=""/>
									</div>
								</div>
							</div>
							<div class="item">
								<div class="row">
									<div class="col-lg-12">
										<h2>پالایه پیامک های دریافتی</h2>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-9">
										<p>در صورتی که قصد یک ارتباط دو طرفه با مخاطبین خود دارید، دریافت پیامک مخاطبین
										   ضروری
										   است، اما وقتی حجم دریافت ها زیاد می شود، نیاز به مدیریت دارد، این امکان؛ بر
										   اساس
										   مولفه های مختلف پیامک دریافتی را مطالعه و تفکیک می نماید.
										</p>
									</div>
									<div class="col-lg-3">
										<img class="img-responsive"
										     src="images/rasel.png"
										     alt=""/>
									</div>
								</div>
							</div>
							<div class="item">
								<div class="row">
									<div class="col-lg-12">
										<h2>منشی</h2>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-9">
										<p>پرکاربرد ترین سرویس سامانه مبتنی بر دریافت؛ به این ترتیب که می توان برای متن
										   ارسالی
										   مخاطب پاسخ مشخصی ارسال نمود، به عنوان نمونه با ارسال عدد 1 توسط مخاطب لیست
										   محصولات
										   برای وی ارسال شود.
										</p>
									</div>
									<div class="col-lg-3">
										<img class="img-responsive"
										     src="images/connector.png"
										     alt=""/>
									</div>
								</div>
							</div>
						</div>
						<!-- Controls -->
						<a class="left carousel-control"
						   href="#panel-features"
						   role="button"
						   data-slide="prev">
				<span class="glyphicon glyphicon-chevron-left"
				      aria-hidden="true"></span>
							<span class="sr-only">Previous</span>
						</a>
						<a class="right carousel-control"
						   href="#panel-features"
						   role="button"
						   data-slide="next">
				<span class="glyphicon glyphicon-chevron-right"
				      aria-hidden="true"></span>
							<span class="sr-only">Next</span>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<section id="products">
	<div class="center-container">
		<div class="center-field">
			<div class="container">
				<h1>محصولات</h1>

				<h2>کانکتور</h2>

				<div class="row">
					<div class="col-lg-offset-1 col-lg-3">
						<img class="img-responsive"
						     src="images/connector.png"
						     alt=""/>
					</div>
					<div class="col-lg-7">
						<p>سازمان های بزرگ که نیاز به کنترل دسترسی ها دارند، کانکتور را به عنوان یک محصول مناسب انتخاب
						   می کنند،
						   این سامانه
						   نه تنها در همه حوزه از دفترچه تلفن تا مشاهده متن و شماره پیامک های دریافتی دسترسی ایجاد می
						   کند، بلکه
						   در خصوص پاسخ
						   به پیامک های دریافتی نیز یک اتوماسیون دارد تا روال پاسخ گویی به پیامک های دریافتی طبق روالی
						   مشخص
						   انجام شود.
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<section id="rasel">
	<div class="center-container">
		<div class="center-field">
			<div class="container">
				<h2>راسل</h2>

				<div class="row">
					<div class="col-lg-offset-1 col-lg-7">
						<p>استفاده از سامانه بر روی مرورگر تلفن همراه تجربه دلچسبی نیست، لذا با استفاده از راسل که یک
						   نرم افزار
						   اندروید
						   می
						   باشد، می توانید پیامک ارسال کنید، این ارسال از طریق سامانه شما انجام می شود و هزینه ای برای
						   سیم کارت
						   شما
						   نخواهد
						   داشت، در صورتی که گوشی شما به اینترنت دسترسی داشته باشد، امکانات بیشتری در ارسال خواهید
						   داشت.
						</p>
					</div>
					<div class="col-lg-3">
						<img class="img-responsive"
						     src="images/rasel.png"
						     alt=""/>
					</div>
				</div>
				<a class="btn btn-lg btn-primary"
				   href="http://www.3300.ir/RaselSmsManager.apk"
				   target="_blank">دریافت نسخه اندروید
				</a>
			</div>
		</div>
	</div>
</section>
<section id="webservice">
	<div class="center-container">
		<div class="center-field">
			<h1>وب سرویس</h1>

			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<p>ارسال پیامک تکی و آرایه ای(چند تایی) را فراهم می نماید. و امکان دریافت پیامک ارسال شده به
						   شماره مجازی
						   را
						   مهیا می
						   کند (البته در خصوص دریافت، سرویس انتقال ترافیک توصیه می شود).
						</p>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-4">
						<div class="well well-sm">
							<h2>برخی از امکانات وب سرویس</h2>
							<ul>
								<li>ارسال تکی و گروهی</li>
								<li>دریافت وضعیت تحویل پیامک<br>(delivery report)</li>
								<li>دریافت وضعیت کاربر از قبیل زمان باقی مانده، اعتبار و ...</li>
								<li>افزودن مخاطب در دفترچه تلفن سامانه و یا ویرایش اطلاعات آن</li>
							</ul>
						</div>
					</div>
					<div class="col-lg-8">
						<div class="panel-group"
						     id="accordion"
						     role="tablist"
						     aria-multiselectable="true">
							<div class="panel panel-default">
								<div class="panel-heading"
								     role="tab"
								     id="headingOne">
									<h4 class="panel-title">
										<a data-toggle="collapse"
										   data-parent="#accordion"
										   href="#collapseOne"
										   aria-expanded="true"
										   aria-controls="collapseOne">
											نمونه کد ها و راهنما
										</a>
									</h4>
								</div>
								<div id="collapseOne"
								     class="panel-collapse collapse in"
								     role="tabpanel"
								     aria-labelledby="headingOne">
									<div class="panel-body">
										<table class="table table-bordered table-striped table-responsive table-condensed">
											<thead>
											<tr>
												<th>فایل های مورد استفاده وب سرویس</th>
												<th>دریافت فایل</th>
												<th>فایل های مورد استفاده وب سرویس</th>
												<th>دریافت فایل</th>
											</tr>
											</thead>
											<tbody>
											<tr>
												<td>فایل راهنمای وب سرویس</td>
												<td>
													<a href="/webservice/help.pdf"
													   class="btn btn-success btn-sm">
														<span class="fa fa-cloud-download"></span>
													</a>
												</td>
												<td></td>
												<td></td>
											</tr>
											<tr>
												<td>Delphi 2007 Windows</td>
												<td>
													<a href="/webservice/Delphi2007.zip"
													   class="btn btn-success btn-sm">
														<span class="fa fa-cloud-download"></span>
													</a>
												</td>
												<td>VB.NET Website</td>
												<td>
													<a href="/webservice/VBNETWEB.zip"
													   class="btn btn-success btn-sm">
														<span class="fa fa-cloud-download"></span>
													</a>
												</td>
											</tr>
											<tr>
												<td>Delphi 7 Windows</td>
												<td>
													<a href="/webservice/Delphi7.zip"
													   class="btn btn-success btn-sm">
														<span class="fa fa-cloud-download"></span>
													</a>
												</td>
												<td>Visual Basic 6 Windows</td>
												<td>
													<a href="/webservice/VB6.zip"
													   class="btn btn-success btn-sm">
														<span class="fa fa-cloud-download"></span>
													</a>
												</td>
											</tr>
											<tr>
												<td>C#.NET Website</td>
												<td>
													<a href="/webservice/CSharpNETWEB.zip"
													   class="btn btn-success btn-sm">
														<span class="fa fa-cloud-download"></span>
													</a>
												</td>
												<td>PHP5 Website</td>
												<td>
													<a href="/webservice/PHPWEB.zip"
													   class="btn btn-success btn-sm">
														<span class="fa fa-cloud-download"></span>
													</a>
												</td>
											</tr>
											</tbody>
										</table>
									</div>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading"
								     role="tab"
								     id="headingTwo">
									<h4 class="panel-title">
										<a data-toggle="collapse"
										   data-parent="#accordion"
										   href="#collapseTwo"
										   aria-expanded="true"
										   aria-controls="collapseTwo">
											تبادل با وب
										</a>
									</h4>
								</div>
								<div id="collapseTwo"
								     class="panel-collapse collapse"
								     role="tabpanel"
								     aria-labelledby="headingTwo">
									<div class="panel-body">
										<table class="table table-bordered table-striped table-responsive table-condensed">
											<thead>
											<tr>
												<th>فایل های مورد استفاده تبادل با وب</th>
												<th>دریافت فایل</th>
											</tr>
											</thead>
											<tbody>
											<tr>
												<td>فایل راهنمای وب سرویس</td>
												<td>
													<a href="/webservice/webrequest/help.pdf"
													   class="btn btn-success btn-sm">
														<span class="fa fa-cloud-download"></span>
													</a>
												</td>
											</tr>
											<tr>
												<td>C#.NET Website</td>
												<td>
													<a href="/webservice/webrequest/cs.zip"
													   class="btn btn-success btn-sm">
														<span class="fa fa-cloud-download"></span>
													</a>
												</td>
											</tr>
											<tr>
												<td>PHP5 Website</td>
												<td>
													<a href="/webservice/webrequest/php.zip"
													   class="btn btn-success btn-sm">
														<span class="fa fa-cloud-download"></span>
													</a>
												</td>
											</tr>
											</tbody>
										</table>
									</div>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading"
								     role="tab"
								     id="headingThree">
									<h4 class="panel-title">
										<a data-toggle="collapse"
										   data-parent="#accordion"
										   href="#collapseThree"
										   aria-expanded="true"
										   aria-controls="collapseThree">
											انتقال ترافیک
										</a>
									</h4>
								</div>
								<div id="collapseThree"
								     class="panel-collapse collapse"
								     role="tabpanel"
								     aria-labelledby="headingThree">
									<div class="panel-body">
										<table class="table table-bordered table-striped table-responsive table-condensed">
											<thead>
											<tr>
												<th>فایل های مورد استفاده انتقال ترافیک</th>
												<th>دریافت فایل</th>
											</tr>
											</thead>
											<tbody>
											<tr>
												<td>فایل راهنمای انتقال ترافیک</td>
												<td>
													<a href="/webservice/traficrelay/help.pdf"
													   class="btn btn-success btn-sm">
														<span class="fa fa-cloud-download"></span>
													</a>
												</td>
											</tr>
											</tbody>
										</table>
									</div>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading"
								     role="tab"
								     id="headingFour">
									<h4 class="panel-title">
										<a data-toggle="collapse"
										   data-parent="#accordion"
										   href="#collapseFour"
										   aria-expanded="true"
										   aria-controls="collapseFour">
											ارسال از طریق HTTP/S
										</a>
									</h4>
								</div>
								<div id="collapseFour"
								     class="panel-collapse collapse"
								     role="tabpanel"
								     aria-labelledby="headingFour">
									<div class="panel-body">
										<table class="table table-bordered table-striped table-responsive table-condensed">
											<thead>
											<tr>
												<th>فایل های مورد استفاده ارسال از طریق وب</th>
												<th>دریافت فایل</th>
											</tr>
											</thead>
											<tbody>
											<tr>
												<td>فایل راهنمای وب سرویس</td>
												<td>
													<a href="#"
													   class="btn btn-success btn-sm">
														<span class="fa fa-cloud-download"></span>
													</a>
												</td>
											</tr>
											</tbody>
										</table>
									</div>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading"
								     role="tab"
								     id="headingFive">
									<h4 class="panel-title">
										<a data-toggle="collapse"
										   data-parent="#accordion"
										   href="#collapseFive"
										   aria-expanded="true"
										   aria-controls="collapseFive">
											وب سرويس Sharepoint
										</a>
									</h4>
								</div>
								<div id="collapseFive"
								     class="panel-collapse collapse"
								     role="tabpanel"
								     aria-labelledby="headingFive">
									<div class="panel-body">
										<table class="table table-bordered table-striped table-responsive table-condensed">
											<thead>
											<tr>
												<th>فایل های مورد استفاده وب سرویس Sharepoint</th>
												<th>دریافت فایل</th>
											</tr>
											</thead>
											<tbody>
											<tr>
												<td>فایل راهنمای وب سرویس Sharepoint</td>
												<td>
													<a href="/webservice/sharepoint.pdf"
													   class="btn btn-success btn-sm">
														<span class="fa fa-cloud-download"></span>
													</a>
												</td>
											</tr>
											</tbody>
										</table>
									</div>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading"
								     role="tab"
								     id="headingSix">
									<h4 class="panel-title">
										<a data-toggle="collapse"
										   data-parent="#accordion"
										   href="#collapseSix"
										   aria-expanded="true"
										   aria-controls="collapseSix">
											افزونه جوملا
										</a>
									</h4>
								</div>
								<div id="collapseSix"
								     class="panel-collapse collapse"
								     role="tabpanel"
								     aria-labelledby="headingSix">
									<div class="panel-body">
										<table class="table table-bordered table-striped table-responsive table-condensed">
											<thead>
											<tr>
												<th>فایل های مورد استفاده افزونه جوملا</th>
												<th>دریافت فایل</th>
											</tr>
											</thead>
											<tbody>
											<tr>
												<td>کامپوننت جوملا</td>
												<td>
													<a href="/webservice/joomla/com_smsnewsletter3.zip"
													   class="btn btn-success btn-sm">
														<span class="fa fa-cloud-download"></span>
													</a>
												</td>
											</tr>
											<tr>
												<td>ماژول جوملا</td>
												<td>
													<a href="/webservice/joomla/mod_smsnewsletter3.zip"
													   class="btn btn-success btn-sm">
														<span class="fa fa-cloud-download"></span>
													</a>
												</td>
											</tr>
											</tbody>
										</table>
									</div>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading"
								     role="tab"
								     id="headingSeven">
									<h4 class="panel-title">
										<a data-toggle="collapse"
										   data-parent="#accordion"
										   href="#collapseSeven"
										   aria-expanded="true"
										   aria-controls="collapseSeven">
											شبیه ساز وب سرویس مگفا
										</a>
									</h4>
								</div>
								<div id="collapseSeven"
								     class="panel-collapse collapse"
								     role="tabpanel"
								     aria-labelledby="headingSeven">
									<div class="panel-body">
										<table class="table table-bordered table-striped table-responsive table-condensed">
											<thead>
											<tr>
												<th>فایل های مورد استفاده شبیه ساز مگفا</th>
												<th>دریافت فایل</th>
											</tr>
											</thead>
											<tbody>
											<tr>
												<td>فایل راهنمای وب سرویس</td>
												<td>
													<a href="/webservice/magfasim/magfasim.pdf"
													   class="btn btn-success btn-sm">
														<span class="fa fa-cloud-download"></span>
													</a>
												</td>
											</tr>
											<tr>
												<td>C#.NET Website</td>
												<td>
													<a href="/webservice/magfasim/magfasimcs.zip"
													   class="btn btn-success btn-sm">
														<span class="fa fa-cloud-download"></span>
													</a>
												</td>
											</tr>
											<tr>
												<td>PHP5 Website</td>
												<td>
													<a href="/webservice/magfasim/magfasimphp.zip"
													   class="btn btn-success btn-sm">
														<span class="fa fa-cloud-download"></span>
													</a>
												</td>
											</tr>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<section id="bulk">
	<div class="center-container">
		<div class="center-field">
			<h1>ارسال تبلیغاتی</h1>

			<div class="container">
				<div class="col-lg-4">
					<div class="well well-sm">
						<h2>ارسال بر اساس شهر و شهرستان</h2>

						<p>در این ارسال می توان به شماره های همراه اول یک شهر مشخص، به تفکیک نوع سیم کارت (دائمی و
						   اعتباری)،
						   پیامک
						   ارسال نمود.
						</p>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="well well-sm">
						<h2>ارسال بر اساس کد پستی</h2>

						<p>در این ارسال، مبنا کدپستی است که مشترکین همراه اول قبض خود را دریافت می کنند، بدیهی است این
						   ارسال
						   صرفا
						   برای مشترکین دائمی صورت می گیرد.
						</p>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="well well-sm">
						<h2>ارسال به تفکیک سن و جنسیت</h2>

						<p>در این ارسال می توان به تفکیک سن و جنسیت و نوع سیم کارت به مشترکین همراه اول پیامک ارسال
						   کنید.
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<section id="about">
	<div class="center-container">
		<div class="center-field">
			<div class="container">
				<h1>نگین ارتباط</h1>

				<p>واحد خدمات ارزش افزوده شرکت سهامی خاص نگین رایانه الماس خراسان با نام تجاری نگین ارتباط با رویکردی
				   حرفه ای به
				   این بستر؛ سعی در تولید و ارائه سامانه های تخصصی نرم افزاری نموده که می توان در هر ارگان و سازمان و یا
				   شغل و
				   حرفه ای به عنوان بخش مهمی در جهت تبلیغات، ارتباط با کارکنان، تعامل با مشتریان و .... مورد استفاده
				   قرار
				   گیرد.
				</p>
				<p>
					<a href="http://www.negincp.ir">واحد تامین محتوای نگین</a> یکی دیگر از واحدهای شرکت سهامی خاص نگین رایانه الماس خراسان می باشد که در حوزه نشر دیجیتال فعالیت نموده و مجری
					<a href="http://www.faraketab.ir">کتابخوان دیجیتال فراکتاب</a> است.</p>

				<h2>افتخار همکاری با ...</h2>

				<div class="well well-lg">
					<div class="row gold">
						<div class="col-lg-2 col-xs-6">
							<a href="#"
							   class="thumbnail"
							   data-toggle="tooltip"
							   data-placement="bottom"
							   data-html="true"
							   title="<ul><li>روابط عمومی</li><li>Sms بانک</li></ul>">
								<img src="images/customers/1-mizan.png"
								     alt=""/>
							</a>
						</div>
						<div class="col-lg-2 col-xs-6">
							<a href="#"
							   class="thumbnail">
								<img src="images/customers/3-foolad.png"
								     alt=""/>
							</a>
						</div>
						<div class="col-lg-2 col-xs-6">
							<a href="#"
							   class="thumbnail"
							   data-toggle="tooltip"
							   data-placement="bottom"
							   data-html="true"
							   title="<ul><li>اداره کل روابط عمومی آستان قدس رضوی</li><li>سامانه پاسخگویی به سوالات شرعی</li><li>معاونت توسعه مهندسي آستان قدس</li><li>انتشارات آستان قدس رضوی (به نشر)</li><li>تربیت بدنی آستان قدس رضوی</li><li>مركز آموزش علمی کاربردی آستان قدس رضوي</li></ul>">
								<img src="images/customers/2-astan.png"
								     alt=""/>
							</a>
						</div>
						<div class="col-lg-2 col-xs-6">
							<a href="#"
							   class="thumbnail">
								<img src="images/customers/9-tabarok.png"
								     alt=""/>
							</a>
						</div>
						<div class="col-lg-2 col-xs-6">
							<a href="#"
							   class="thumbnail"
							   data-toggle="tooltip"
							   data-placement="bottom"
							   data-html="true"
							   title="<ul><li>مرکز رشد واحدهای فناوری دانشگاه</li><li>مرکز اطلاع رسانی کتابخانه مرکزی</li><li>مرکز آموزشهای الکترونیکی</li><li>واحد آموزش</li><li>تربیت بدنی</li><li>شرکت تعاونی مصرف دانشگاه</li><li>دانشکده منابع طبیعی و محیط زیست</li><li>دانشکده علوم ریاضی</li><li>کالج دانشگاه</li></ul>">
								<img src="images/customers/10-ferdosi.png"
								     alt=""/>
							</a>
						</div>
						<div class="col-lg-2 col-xs-6">
							<a href="#"
							   class="thumbnail">
								<img src="images/customers/14-isam.png"
								     alt=""/>
							</a>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-1 col-xs-6">
							<a href="#"
							   class="thumbnail"
							   data-toggle="tooltip"
							   data-placement="bottom"
							   data-html="true"
							   title="<ul><li>دفتر پژوهش</li><li>اگهی تلفنی</li><li>واحد توزیع</li></ul>">
								<img src="images/customers/4-khorasan.png"
								     alt=""/>
							</a>
						</div>
						<div class="col-lg-1 col-xs-6">
							<a href="#"
							   class="thumbnail"
							   data-toggle="tooltip"
							   data-placement="bottom"
							   data-html="true"
							   title="<ul><li>مدیریت ارزیابی عملکرد و پاسخگویی به شکایات سازمان منطقه آزاد کیش</li><li>روابط عمومی سازمان</li></ul>">
								<img src="images/customers/5-kish.png"
								     alt=""/>
							</a>
						</div>
						<div class="col-lg-1 col-xs-6">
							<a href="#"
							   class="thumbnail"
							   data-toggle="tooltip"
							   data-placement="bottom"
							   data-html="true"
							   title="<ul><li>واحد روابط عمومی</li><li>واحد اکرام</li><li>واحد مشارکتهای مردمی</li><li>واحد درمان</li><li>واحد خودکفایی</li><li>واحد اداری و رفاه کارکنان</li><li>واحد حراست</li><li>اداره حمایتهای اجتماعی</li><li>دبیرخانه همایش های جشنواره امام رضا (ع)</li></ul>">
								<img src="images/customers/7-emdad.png"
								     alt=""/>
							</a>
						</div>
						<div class="col-lg-1 col-xs-6">
							<a href="#"
							   class="thumbnail">
								<img src="images/customers/11-koja.png"
								     alt=""/>
							</a>
						</div>
						<div class="col-lg-1 col-xs-6">
							<a href="#"
							   class="thumbnail"
							   data-toggle="tooltip"
							   data-placement="bottom"
							   data-html="true"
							   title="<ul><li>مدیریت آمار و فناوری اطلاعات و ارتباطات</li><li>مرکز تحقیقات جراحی عروق و اندوواسکولار</li><li>مرکز رشد واحدهای فناوری فراورده های دارویی</li><li>دانشکده داروسازی</li><li>دانشکده دندانپزشکی</li><li>دانشکده طب سنتی</li><li>واحد وب سایت</li><li>معاونت غذا و دارو</li><li>معاونت درمان</li><li>معاونت پژوهش</li><li>شورای انضباطی دانشجویان</li><li>کانون بسیج جامعه پزشکی</li><li>حراست</li><li>فروشگاه کتاب</li><li>واحد مشارکت مردمی</li><li>واحد بیماریهای خاص</li><li>مدیریت امور مالی</li><li>امور ایثارگران دانشگاه</li><li>امور هیات علمی</li></ul>">
								<img src="images/customers/12-pezashki.png"
								     alt=""/>
							</a>
						</div>
						<div class="col-lg-1 col-xs-6">
							<a href="#"
							   class="thumbnail">
								<img src="images/customers/13-gloestan.png"
								     alt=""/>
							</a>
						</div>
						<div class="col-lg-1 col-xs-6">
							<a href="#"
							   class="thumbnail">
								<img src="images/customers/15-allah.png"
								     alt=""/>
							</a>
						</div>
						<div class="col-lg-1 col-xs-6">
							<a href="#"
							   class="thumbnail"
							   data-toggle="tooltip"
							   data-placement="bottom"
							   data-html="true"
							   title="<ul><li>شعبه درمان</li><li>شعبه سادات</li><li>شعبه ایتام</li><li>شعبه تهران</li><li>شعب کلیه شهرستانها</li></ul>">
								<img src="images/customers/16-abshar.png"
								     alt=""/>
							</a>
						</div>
						<div class="col-lg-1 col-xs-6">
							<a href="#"
							   class="thumbnail">
								<img src="images/customers/17-hafez.png"
								     alt=""/>
							</a>
						</div>
						<div class="col-lg-1 col-xs-6">
							<a href="#"
							   class="thumbnail">
								<img src="images/customers/18-parand.png"
								     alt=""/>
							</a>
						</div>
						<div class="col-lg-1 col-xs-6">
							<a href="#"
							   class="thumbnail"
							   data-toggle="tooltip"
							   data-placement="bottom"
							   data-html="true"
							   title="<ul><li>مدیریت فناوری</li><li>معاونت نشر</li><li>معاونت بازرگانی</li><li>معاونت اجرایی</li><li>دفتر تهران</li><li>معاونت پشتیبانی</li></ul>">
								<img src="images/customers/19-behnashr.png"
								     alt=""/>
							</a>
						</div>
						<div class="col-lg-1 col-xs-6">
							<a href="#"
							   class="thumbnail">
								<img src="images/customers/21-rahahan.png"
								     alt=""/>
							</a>
						</div>
						<div class="col-lg-1 col-xs-6">
							<a href="#"
							   class="thumbnail"
							   data-toggle="tooltip"
							   data-placement="bottom"
							   data-html="true"
							   title="<ul><li>روابط عمومی</li><li>صندوق رفاه کارکنان</li></ul>">
								<img src="images/customers/22-aras.png"
								     alt=""/>
							</a>
						</div>
						<div class="col-lg-1 col-xs-6">
							<a href="#"
							   class="thumbnail">
								<img src="images/customers/23-benetton.png"
								     alt=""/>
							</a>
						</div>
						<div class="col-lg-1 col-xs-6">
							<a href="#"
							   class="thumbnail"
							   data-toggle="tooltip"
							   data-placement="bottom"
							   data-html="true"
							   title="<ul><li>مجتمع ثامن</li><li>دفتر فناوری اطلاعات</li></ul>">
								<img src="images/customers/24-hozeh2.png"
								     alt=""/>
							</a>
						</div>
						<div class="col-lg-1 col-xs-6">
							<a href="#"
							   class="thumbnail">
								<img src="images/customers/25-metro.png"
								     alt=""/>
							</a>
						</div>
						<div class="col-lg-1 col-xs-6">
							<a href="#"
							   class="thumbnail"
							   data-toggle="tooltip"
							   data-placement="bottom"
							   data-html="true"
							   title="<ul><li>مرکز رسیدگی به امور مساجد خراسان رضوی</li><li>مرکز رسیدگی به امور مساجد خراسان شمالی</li><li>مرکز رسیدگی به امور مساجد خراسان جنوبی</li></ul>">
								<img src="images/customers/26-masjedkh.png"
								     alt=""/>
							</a>
						</div>
						<div class="col-lg-1 col-xs-6">
							<a href="#"
							   class="thumbnail">
								<img src="images/customers/27-tablighat.png"
								     alt=""/>
							</a>
						</div>
						<div class="col-lg-1 col-xs-6">
							<a href="#"
							   class="thumbnail"
							   data-toggle="tooltip"
							   data-placement="bottom"
							   data-html="true"
							   title="<ul><li>بانک صادرات- شعبه سرپرستی خراسان رضوی<ul><li>سامانه اعلام وضعیت دستگاه خودپرداز</li><li>واحد روابط عمومی</li><li>حوزه ارزی</li><li>امور کارکنان</li><li>حوزه شعب و بازاریابی</li><li>دایره اعتبارات</li></ul></li>بانک صادرات چهار محال بختیاری</ul>">
								<img src="images/customers/28-saderat.png"
								     alt=""/>
							</a>
						</div>
						<div class="col-lg-1 col-xs-6">
							<a href="#"
							   class="thumbnail">
								<img src="images/customers/29-azad.png"
								     alt=""/>
							</a>
						</div>
						<div class="col-lg-1 col-xs-6">
							<a href="#"
							   class="thumbnail">
								<img src="images/customers/30-bonyad.png"
								     alt=""/>
							</a>
						</div>
						<div class="col-lg-1 col-xs-6">
							<a href="#"
							   class="thumbnail"
							   data-toggle="tooltip"
							   data-placement="bottom"
							   data-html="true"
							   title="<ul><li>کانون بازنشستگان بنیاد شهید خراسان رضوی</li><li>سازمان بنیاد شهید و امور ایثارگران شهرستان تربت جام</li><li>بنیاد شهید انقلاب اسلامی- مرکز امور کارکنان تهران</li><li>بنیاد شهید و امور ایثارگران بجستان</li></ul>">
								<img src="images/customers/31-shahid.png"
								     alt=""/>
							</a>
						</div>
						<div class="col-lg-1 col-xs-6">
							<a href="#"
							   class="thumbnail">
								<img src="images/customers/32-shora.png"
								     alt=""/>
							</a>
						</div>
						<div class="col-lg-1 col-xs-6">
							<a href="#"
							   class="thumbnail"
							   data-toggle="tooltip"
							   data-placement="bottom"
							   data-html="true"
							   title="<ul><li>شرکت توزیع برق خراسان رضوی<ul><li>اداره روابط عمومی</li><li>دیسپاچینگ</li><li>اداره بازرگانی</li><li>د فتر توسعه مدیریت و تحول اداری</li><li>اداره رفاه</li><li>اداره حسابداری</li><li>دبیر کمیته تعیین صلاحیت پیمانکاران</li></ul></li><li>شرکت توزیع برق خراسان شمالی<ul><li>اداره نظارت بر خدمات</li></ul></li><li>برق منطقه ای شمال خراسان<ul><li>دیسپاچینگ</li><li>بهره برداری</li><li>روابط عمومی</li></ul></li></ul>">
								<img src="images/customers/33-bargh.png"
								     alt=""/>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<section id="blog">
	<div class="center-container">
		<div class="center-field">
			<div class="container">
				<h1>اخبار و وبلاگ</h1>
				<?php
				$count = 3;
				$feed  = 'http://blog.3300.ir/feed/';
				$feeds = (array)simplexml_load_file($feed);
				foreach ($feeds['channel'] as $key => $value) :
					if ($key == 'item' && $count > 0): ?>
						<h2>
							<span class="fa fa-caret-left"></span>
							<span> </span>
							<a href="<?php echo $value->link; ?>"
							   target="_blank"><?php echo $value->title; ?></a>
							<span> </span>
							<span class="fa fa-caret-right"></span>
						</h2>
						<p class="muted">
							<em>
								<span><?php echo($value->category); ?></span>
							</em>
						</p>
						<p>&nbsp;</p>
						<?php $count--; ?>
					<?php endif; ?>
				<?php endforeach; ?>
				<a class="btn btn-blog btn-warning"
				   target="_blank"
				   href="http://blog.3300.ir">وبلاگ نگين ارتباط
				</a>
			</div>
		</div>
	</div>
</section>
<section id="contact">
	<div class="center-container">
		<div class="center-field">
			<h1>تماس با ما</h1>

			<div class="container">
				<div class="row">
					<div class="col-lg-6 col-lg-offset-3">
						<?php if (isset($contactSave) && $contactSave == true): ?>
							<div class="alert alert-success"
							     role="alert">پیام شما ارسال شد.
							</div>
						<?php endif; ?>
						<form action="index.php"
						      method="post"
						      class="text-left">
							<div class="form-group">
								<label for="name">نام و نام خانوادگی</label>
								<input id="name"
								       class="form-control"
								       type="text"
								       name="name"/>
							</div>
							<div class="form-group">
								<label for="email">پست الکترونیک</label>
								<input id="email"
								       class="form-control"
								       type="text"
								       name="email"/>
							</div>
							<div class="form-group">
								<label for="mobile">تلفن تماس</label>
								<input id="mobile"
								       class="form-control"
								       type="text"
								       name="phone"/>
							</div>
							<div class="form-group">
								<label for="message">پیام
									<span class="text-danger">*</span>
								</label>
					<textarea class="form-control"
					          name="message"
					          id="message"
					          cols="30"
					          rows="10"></textarea>
							</div>
							<div class="form-group">
								<p>تکمیل فیلد های دارای
									<span class="text-danger">*</span>
								   الزامی است.
								</p>
							</div>
							<button class="btn btn-primary btn-lg"
							        name="contact-action">ارسال
							</button>
						</form>
					</div>
				</div>
				<div class="row address">
					<div class="col-lg-3 col-lg-offset-3 text-left">
						<p>مشهد مقدس</p>

						<p>خیابان دانشگاه - بین دانشگاه ۱۲ و ۱۴</p>

						<p>ساختمان مهندس شریفیان - طبقه دوم</p>

						<p>کدپستی 9137686485</p>

						<p>نگین رایانه الماس خراسان</p>
					</div>
					<div class="col-lg-3 text-right">
						<p>تلفن تماس</p>

						<p>051-32299050</p>

						<p>ایمیل</p>

						<p>
							<a href="mailto:info@3300.ir">info@3300.ir</a>
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<div class="modal fade"
     id="login"
     tabindex="-1"
     role="dialog"
     aria-labelledby="login-label"
     aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button"
				        class="close"
				        data-dismiss="modal"
				        aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title"
				    id="login-label">ورود به سامانه ها
				</h4>
			</div>
			<div class="modal-body">
				<p class="text-center">
					<a target="_blank"
					   href="http://connector.3300.ir/"
					   class="btn btn-primary">سامانه پیامک کانکتور
					</a>
				</p>

				<p class="text-center">
					<a target="_blank"
					   href="http://user.3300.ir/"
					   class="btn btn-primary">سامانه تمدید
					</a>
				</p>

				<p class="text-center">
					<a target="_blank"
					   href="http://payment.3300.ir/"
					   class="btn btn-primary">خرید اعتبار پیامک
					</a>
				</p>

				<p class="text-center">
					<a target="_blank"
					   href="http://mali.3300.ir/"
					   class="btn btn-primary">واریز به حساب
					</a>
				</p>
			</div>
			<div class="modal-footer">
				<button type="button"
				        class="btn btn-default"
				        data-dismiss="modal">خروج
				</button>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<a class="go-top page-scroll"
   href="#home">
	<i class="fa fa-angle-up"></i>
</a>
<script src="js/jquery-1.11.2.min.js"></script>
<script src="js/bootstrap-arabic.min.js"></script>
<script src="js/jquery.easing.min.js"></script>
<script src="js/application.js"></script>
</body>
</html>
