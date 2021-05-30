<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Maximus</title>
	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900&display=swap" rel="stylesheet">

    <style type="text/css">
	    html,body,p {color: white;}
		.movableContent.one .table {
			background: #f5f5f5;
		}
		.footer {
			background: #003044;
			color: #fff;
		}
		.footer a {
			color: #fff;
			font-weight: 700;
		}
		.row {
			margin: 0 -7.5px;
		}
		.row [class*="col-"] {
			width: 100%;
			padding: 0 7.5px;
			float: left;
		}
		.row .col-md-3 {
			width: 33.33%;
		}
		* {
			-webkit-box-sizing: border-box;
			-moz-box-sizing: border-box;
			box-sizing: border-box;
		}
		.form-group{margin-bottom: 15px;}
		.form-control{
			font-size: 12px;
			padding: 10px 15px;
			border-radius: 5px;
			border: 1px solid #dcdce3;
			display: block;
			width: 100%;
		}
		.social-icons {
			margin: 0;
			padding: 0;
			position: relative;
			top: 6px;
		}
		.social-icons li {
			display: inline-block;
		}
		.social-icons li a {
			width: 25px;
			display: block;
		}
		.social-icons li a img {
			width: 100%;
		}
		.bullet {width: 8px;}
		.col-right img,
		.col-left img {
			border-radius: 10px;
			padding: 7px;
			background: #fbfbfb;
		}
		.video-container {
			position: relative;
			padding-bottom: 50%;
			height: 0;
			overflow: hidden;
		}
		.video-container iframe {
			position: absolute;
			top: 0;
			left: 0;
			width: 100%;
			height: 100%;
		}
		.movableContent {
			padding: 20px;
			text-align: center;
		}
		.movableContent.one .table {
			border-radius: 10px;
		}
		.movableContent.two .table {
			border-radius: 10px;
			border: 1px solid rgba(255, 255, 255, 0.15);
		}
		body{
			margin:0;
			padding:0;
			width:100% !important;
			-webkit-text-size-adjust:none;
		}
		img{
			border:none;
			font-size:14px;
			font-weight:bold;
			height:auto;
			line-height:100%;
			outline:none;
			text-decoration:none;
			text-transform:capitalize;
		}
		.et-btn {
			margin-top: 30px;
			background: white;
			border-color: white;
			color: #00445e;
			display: block;
			text-decoration: none;
			font-weight: 600;
			font-size: 14px;
			padding: 17px 20px;
			border-radius: 5px;
			width: 100%;
			box-shadow: 0 0 5px rgba(255, 255, 255, 0.3);
		}
		p{ margin:0 0 10px;}
		@media screen and (max-width: 639px) {
			body{ font-size:14px !important;}
			.responsive-table {
				display: block;
				width: 100% !important;
			}

			.responsive-image {
				height: auto;
			}
			.main{
				padding:10px !important;
			}
			.twocol tr{
				display: block !important;
			}
			.col-left{
				padding: 0 0 20px !important;
				width: 100% !important;
				display: block !important;
			}
			.col-left img{
				display: block !important;
				width: 100% !important;
				max-width: 200px !important;
				margin:0 auto !important;
			}
			.listing{
				padding:10px 0 !important;
			}
			.col-text{
				text-align: center;
			}
			.col-text.add{
				padding-bottom: 20px;
			}
		}
	</style>
</head>
<body style="font-family: 'Roboto', sans-serif;margin:0; padding:0;font-size:14px; color:white; background:#f5f5f5;">
	<table border="0" cellpadding="0" cellspacing="0" width="100%">
        <tr>
            <td align="center">
                <table border="0" cellpadding="0" cellspacing="0" style="width:600px; background: #fff; box-shadow: 0 20px 25px rgba(0, 0, 0, 0.1);" class="responsive-table">
					<tr class="banner">
                    <td><img src="{{asset('images/email/img-banner.png')}}" class="responsive-image" alt="banner image" style="border:0; display: block; width: 100%;"></td>
					</tr>
					<tr style="background: #00445e;">
						<td>
							<div class="movableContent two" style="padding: 20px;">
								<table class="table" border="0" cellpadding="0" cellspacing="0" width="100%">
									<tbody>
										<tr>
											<td>
												<table border="0" cellpadding="0" cellspacing="0" width="100%">
													<tbody>
														<tr>
															<td valign="top" width="20">&nbsp;</td>
															<td>
																<table align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
																	<tbody>
																		<tr>
																			<td height="20"></td>
																		</tr>
																		<tr>
																			<td>
																				<div class="contentEditableContainer contentTextEditable">
																					<div class="contentEditable" style="text-align: left; color: white;">
																						<h1 style="color: white;">Thank you for registering your interest. A member of the team will contact you.</h1>
																						<br>
																					</div>
																				</div>
																			</td>
																		</tr>
																		<tr>
																			<td height="20"></td>
																		</tr>
																	</tbody>
																</table>
															</td>
															<td valign="top" width="20">&nbsp;</td>
														</tr>
													</tbody>
												</table>
											</td>
										</tr>
									</tbody>
								</table>
							</div>
						</td>
					</tr>
					<tr>
						<td style="padding: 15px 20px; text-align: center;" class="footer">
							<ul class="social-icons" style="float:right">
								<li><a href="#"><img src="{{asset('images/email/facebook.png')}}" alt=""></a></li>
								<li><a href="#"><img src="{{asset('images/email/twitter.png')}}" alt=""></a></li>
								<li><a href="#"><img src="{{asset('images/email/instagram.png')}}" alt=""></a></li>
								<li><a href="#"><img src="{{asset('images/email/linkedin.png')}}" alt=""></a></li>
								<li><a href="#"><img src="{{asset('images/email/youtube.png')}}" alt=""></a></li>
							</ul>
							<img src="{{asset('images/email/logo.png')}}" style="width: 150px; margin: auto; display:block;float:left">
						</td>
					</tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
