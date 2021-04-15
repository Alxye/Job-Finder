<?php if (!defined('THINK_PATH')) exit();?><style type="text/css">
	.hover-color:hover{
		background-color: #dc553e;
	}

	/****************************************************************************************/
	/*                                       Tool                                           */
	/****************************************************************************************/

	div,
	form,
	img,
	ul,
	ol,
	li,
	p {
		margin: 0;
		padding: 0;
		border: 0;
	}
	li {
		list-style-type: none;
	}
	h1,
	h2,
	h3,
	h4,
	h5,
	h6 {
		margin: 0;
		padding: 0;
		font-weight: 100;
	}
	a.muted {
		color: #999;
		text-decoration: none;
	}
	a.muted:hover,
	a.muted:focus {
		color: #de5757;
		text-decoration: none;
	}
	a.highlight {
		color: #de5757;
	}
	a.highlight:hover,
	a.highlight:focus {
		color: #444;
	}
	.btn {
		min-width: 98px;
	}
	.box {
		background-color: #FFF;
		margin-bottom: 10px;
		border: 1px solid #D3D4D5;
	}
	.box-title {
		line-height: 40px;
		font-size: 14px;
		font-weight: bold;
		border-bottom: 1px solid #DEDEDE;
		height: 40px;
		background: #FFF;
		text-align: left;
		padding-left: 15px;
		background-color: #FFF;
	}
	.wei-user-logo {
		width: 45px;
		height: 45px;
		border: 1px solid #CCC;
		background-color: white;
	}
	.wei-user-logo img {
		width: 45px;
		height: 45px;
	}
	.white-popup {
		position: relative;
		background: #FFF;
		padding: 20px;
		width: 690px;
		margin: 20px auto;
	}
	/****************************************************************************************/
	/*                                    网站整体架构                                        */
	/****************************************************************************************/

	body {
		background-color: #FFF;
	}
	.container {
		width: 1180px;
		margin-top: 10px;
	}
	.row .col-md-9 {
		width: 960px;
		float: left;
	}
	.row .col-md-3 {
		width: 210px;
		padding-left: 0;
		padding-right: 0;
		margin-left: 10px;
		float: left;
	}
	.mtop_box,
	.headerbox,
	.nav_bar,
	.main,
	.main2,
	.search_top_tip,
	.crumb,
	.h1_tit {
		width: 1180px;
		margin: 0 auto;
		text-align: left;
	}
	.main970 { width: 860px; margin: 0 auto; text-align: left; }
	.main {
		background-color: #FFF;
		margin-bottom: 20px;
		border: 1px solid #D3D4D5;
		-webkit-box-sizing: border-box;
		-moz-box-sizing: border-box;
		box-sizing: border-box;
	}
	.main_left { width: 940px; background-color: #FFF; margin-bottom: 20px; border: 1px solid #D3D4D5; }
	.main_right { width: 230px; float: right; }
	.main_right_box { background-color: #FFF; margin-bottom: 10px; border: 1px solid #D3D4D5 }
	#back_to_top {
		background: url(../../images/icon_rocket.png) 0 0 no-repeat;
		width: 43px;
		height: 72px;
		position: fixed;
		bottom: 20px;
		left: 50%;
		margin-left: 620px;
		display: none;
	}
	#back_to_top:hover,
	#back_to_top:focus {
		background: url(../../images/icon_rocket_highlight.png) 0 0 no-repeat;
	}
	.btn-group-share,
	.btn-group-share *,
	.btn-group-share *:before,
	.btn-group-share *:after {
		-webkit-box-sizing: border-box;
		-moz-box-sizing: border-box;
		box-sizing: border-box;
	}
	.btn-group-share .btn-sm {
		color: #999;
	}
	.btn-group-share .btn-sm:hover,
	.btn-group-share .btn-sm:active {
		color: #333;
	}
	.btn-share-weibo,
	.btn-share-weibo:active {
		background: url(../../images/icon-weibo.png) 10px 8px no-repeat;
		padding-left: 50px;
		width: 160px;
	}
	.btn-share-weixin,
	.btn-share-weixin:active {
		background: url(../../images/icon-weixin.png) 10px 8px no-repeat;
		padding-left: 50px;
		width: 160px;
	}
	.btn-share-qq,
	.btn-share-qq:active {
		background: url(../../images/icon-qq.png) 10px 8px no-repeat;
		padding-left: 50px;
		width: 160px;
	}
	.btn-share-weibo-sm {
		background: url(../../images/icon-weibo-mini-muted.png) 10px 1px no-repeat;
		padding-left: 35px;
		width: 120px;
	}
	.btn-share-weibo-sm:hover,
	.btn-share-weibo-sm:active {
		background: url(../../images/icon-weibo-mini.png) 10px 1px no-repeat;
	}
	.btn-share-weixin-sm {
		background: url(../../images/icon-weixin-mini-muted.png) 10px 1px no-repeat;
		padding-left: 35px;
		width: 120px;
	}
	.btn-share-weixin-sm:hover,
	.btn-share-weixin-sm:active {
		background: url(../../images/icon-weixin-mini.png) 10px 1px no-repeat;
	}
	.btn-share-qq-sm {
		background: url(../../images/icon-qq-mini-muted.png) 10px 1px no-repeat;
		padding-left: 35px;
		width: 120px;
	}
	.btn-share-qq-sm:hover,
	.btn-share-qq-sm:active {
		background: url(../../images/icon-qq-mini.png) 10px 1px no-repeat;
	}
	.j-icon-hot {
		width: 16px;
		height: 22px;
		background: url(../../images/icon-hot.jpg) 0px 3px no-repeat;
		display: inline-block;
		vertical-align: top;
	}
	/* 右上角添加小红点 */

	.notifier:before {
		content: "•";
		font-family: FontAwesome;
		font-size: 18px;
		position: absolute;
		top: 10px;
		right: 12px;
		color: #FF6633;
	}
	.notifier-number[data-notifier-number]:after {
		content: attr(data-notifier-number);
		position: absolute;
		display: block;
		top: 12px;
		right: 6px;
		font-size: 12px;
		border-radius: 10px;
		background-color: #FF6633;
		color: white;
		padding: 2px 3px;
		line-height: 9px;
		text-align: center;
	}
	.notifier-number[data-notifier-number=""]:after,
	.notifier-number[data-notifier-number="0"]:after {
		display: none;
	}
	/****************************************************************************************/
	/*                                     网站头部尾部                                       */
	/****************************************************************************************/

	.header,
	.header *,
	.header *:before,
	.header *:after,
	.footer,
	.footer *,
	.footer *:before,
	.footer *:after {
		-webkit-box-sizing: border-box;
		-moz-box-sizing: border-box;
		box-sizing: border-box;
	}
	.mtop {
		background-color: #F5F5F5;
		height: 35px;
		line-height: 35px;
		text-align: left;
	}
	.mtop,
	.mtop a {
		color: #666;
	}
	.mtop a:hover,
	.mtop a:focus {
		color: #de5757;
	}
	.mtop a.highlight {
		color: #de5757;
	}
	.mtop a.highlight:hover,
	.mtop a.highlight:focus {
		color: #444444;
	}
	.header {
		text-align: center;
	}
	.header .post {
		float: right;
		margin-top: 8px;
	}
	.header .post a {
		border-radius: 0px;
		-moz-border-radius: 0px;
		-webkit-border-radius: 0px;
		color: #de5757;
		border-color: #de5757;
		width: 130px;
		height: 42px;
		padding-top: 10px;
	}
	.header .post a:hover {
		background-color: #ffe4e4;
	}
	.header .post span {
		display: none;
		color: #512b2b;
		line-height: 46px;
		font-size: 16px;
		padding-right: 10px;
	}
	.header .post .icon-large {
		margin-top: 1px;
		vertical-align: middle;
	}
	.headerbox {
		height: 70px;
		position: relative;
		margin: 10px auto;
	}
	.headerbox .logo {
		width: 202px;
		height: 57px;
		float: left;
		margin-top: 5px;
	}
	.headerbox .logo img {
		float: left;
	}
	.top_search {
		position: relative;
		left: 0;
		float: left;
		margin-left: 100px;
	}
	.top_search form {
		position: relative;
		width: 504px;
		height: 42px;
	}
	.top_search form input {
		width: 100%;
		height: 100%;
		padding-right: 40px;
		border: 2px solid #de5757;
		border-radius: 0;
	}
	.top_search form button {
		position: absolute;
		top: 0;
		right: 0;
		font-size: 20px;
		padding-top: 4px;
		color: #ca4242;
		background-color: transparent;
		border: 0;
		min-width: 30px;
		line-height: 32px;
	}
	.top_search .quick_search a {
		display: inline-block;
		margin-right: 10px;
		margin-top: 5px;
	}
	.nav_box {
		height: 50px;
		line-height: 50px;
		background-color: #c63838;
	}
	.nav_bar {
		position: relative;
	}
	.nav_bar .nav_logo {
		position: absolute;
		top: -1px;
		left: 0;
	}
	.nav_bar .nav_logo a {
		display: block;
	}
	.nav_bar .nav_logo img {
		width: 132px;
		height: 50px;
	}
	.nav_bar .nav_search {
		position: absolute;
		width: 290px;
		height: 50px;
		top: 0;
		left: 220px;
		text-align: center;
	}
	.nav_bar .nav_search form {
		position: relative;
		display: inline-block;
		width: 260px;
		height: 34px;
		margin: 8px 0;
	}
	.nav_bar .nav_search form input {
		width: 100%;
		height: 100%;
		padding-right: 40px;
		background-color: #dabcbc;
		border: 1px solid #dabcbc;
		border-radius: 2px;
	}
	.nav_bar .nav_search form input:focus {
		background-color: #FFF;
	}
	.nav_bar .nav_search form button {
		position: absolute;
		top: 1px;
		right: 0;
		padding-top: 4px;
		background-color: transparent;
		border: 0;
		min-width: 30px;
		line-height: 24px;
		color: #ffffff;
	}
	.nav_bar .nav_search form button:hover {
		color: #959595;
	}
	.nav_bar .nav_search .quick_search a {
		display: inline-block;
		margin-right: 10px;
		margin-top: 5px;
	}
	.nav_bar .nav_items {
		position: absolute;
		top: 0;
		left: 510px;
	}
	.nav_bar .nav_items a,
	.nav_bar #CategoryTreeWidget h3 a {
		color: #FFF;
		display: block;
	}
	.nav_bar .nav_items li {
		float: left;
		min-width: 58px;
		text-align: center;
	}
	.nav_bar .nav_items li:hover,
	.nav_bar .nav_items li.on {
		background-color: #3f2222;
	}
	.nav_bar .nav_right {
		position: absolute;
		top: 0;
		right: 0;
		width: auto;
		height: 50px;
	}
	.nav_bar .nav_right > li {
		display: block;
		float: left;
		min-width: 50px;
		height: 50px;
		text-align: center;
		line-height: 20px;
	}
	.nav_bar .nav_right > li:hover,
	.nav_bar .nav_right > li.open {
		background-color: #3f2222;
	}
	.nav_bar .nav_right > li > a {
		position: relative;
		display: block;
		padding: 15px;
		line-height: 20px;
		color: #FFFFFF;
		background-color: transparent;
	}
	.nav_bar .nav_right > li.dropdown .caret {
		border-top: 4px solid #FFFFFF;
	}
	.nav_bar .nav_right .dropdown-menu {
		right: 0;
		left: auto;
		margin-top: 0;
		border-top-left-radius: 0;
		border-top-right-radius: 0;
		border-bottom-left-radius: 4px;
		border-bottom-right-radius: 4px;
		text-align: left;
		top: 100%;
		background-color: #3f2222;
		box-shadow: none;
		-webkit-box-shadow: none;
		border: none;
	}
	.nav_bar .nav_right .dropdown-menu .divider {
		height: 1px;
		margin: 9px 0;
		border: 0;
		overflow: hidden;
		background-color: #E5E5E5;
	}
	.nav_bar .nav_right .dropdown-menu > li > a {
		line-height: 2.0;
		color: #FFF;
	}
	.nav_bar .nav_right .dropdown-menu > li > a:hover,
	.nav_bar .nav_right .dropdown-menu > li > a:focus {
		background-color: #512c2c;
		background-image: none;
	}
	.nav_bar .nav_right .dropdown-menu > li .fa {
		margin-right: 5px;
	}
	.nav_bar .list-unstyled {
		position: absolute;
		top: 0;
		right: 0;
		height: 50px;
		color: #FFFFFF;
		font-size: 12px;
	}
	.nav_bar .list-unstyled a {
		color: #FFFFFF;
	}
	.footer {
		color: #ffffff;
		background-color: #c63838;
		font-size: 12px;
		text-align: center;
		padding: 5px 0;
		margin-top: 71px ;
	}
	.footer .info,
	.footer hr,
	.footer .friend {
		width: 1180px;
		margin: 0 auto;
		padding: 20px 0;
	}
	.footer .info div {
		display: inline-block;
		width: 33%;
		border-right: 1px solid #ffffff;
		vertical-align: middle;
		text-align: left;
	}
	.footer .info div:last-child {
		border-right: 0;
	}
	.footer .info .logo p {
		margin: 10px 0;
	}
	.footer .info .link {
		padding: 0 84px;
	}
	.footer .info .link a {
		display: inline-block;
		color: #ffffff;
		margin: 8px 28px;
		text-decoration: none;
	}
	.footer .friend a:hover,
	.footer .info .link a:hover {
		color: #EEE;
	}
	.footer .info .contact {
		text-align: center;
	}
	.footer .info .contact a {
		display: inline-block;
		width: 32px;
		height: 32px;
		margin: 8px;
	}
	.footer .info .contact a.weixin {
		background: url(../../images/icon-circle-weixin.png) 0px 0px no-repeat;
		position: relative;
	}
	.footer .info .contact a.weixin:hover {
		background: url(../../images/icon-circle-weixin-highlight.png) 0px 0px no-repeat;
	}
	.footer .info .contact a.weibo {
		background: url(../../images/icon-circle-weibo.png) 0px 0px no-repeat;
	}
	.footer .info .contact a.weibo:hover {
		background: url(../../images/icon-circle-weibo-highlight.png) 0px 0px no-repeat;
	}
	.footer .info .contact a.douban {
		background: url(../../images/icon-circle-douban.png) 0px 0px no-repeat;
	}
	.footer .info .contact a.douban:hover {
		background: url(../../images/icon-circle-douban-highlight.png) 0px 0px no-repeat;
	}
	.footer .info .contact a.weixin img {
		display: none;
		position: absolute;
		top: -75px;
		left: -180px;
	}
	.footer hr {
		border: 0;
		border-top: 1px solid #ffffff;
		padding: 0;
	}
	.footer .friend {
		text-align: left;
	}
	.footer .friend a {
		display: inline-block;
		color: #ffffff;
		margin-right: 10px;
	}
	/****************************************************************************************/
	/*                                   在线反馈                                       */
	/****************************************************************************************/

	#feedback-link,
	#feedback-link *,
	#feedback-link *:before,
	#feedback-link *:after,
	#feedback-popup *,
	#feedback-popup *:before,
	#feedback-popup *:after {
		-webkit-box-sizing: border-box;
		-moz-box-sizing: border-box;
		box-sizing: border-box;
	}
	#feedback-link {
		position: fixed;
		right: -3px;
		top: 40%;
		width: 35px;
		display: block;
		background-color: #4b3434;
		color: #FFF;
		font-size: 18px;
		padding: 10px 7px 10px 5px;
	}
	#feedback-link:hover {
		right: 0;
		background-color: #9e3333;
	}
	#feedback-popup h2 {
		margin-left: 20px;
	}
	#feedback-popup form {
		margin: 20px 0;
	}
	#feedback-popup input {
		width: 100%;
	}
	@media print {
		#feedback-link,
		#feedback-popup {
			display: none;
		}
	}
	/****************************************************************************************/
	/*                                   Banner轮播图                                       */
	/****************************************************************************************/

	.banner {
		width: 730px;
		height: 290px;
		padding: 0;
		margin: 0;
		border: 1px solid #CCC;
		background-color: #F2F2F2;
	}
	.banner img {
		width: 728px;
		height: 288px;
		top: 0;
		left: 0;
	}
	.sub-banner {
		margin-top: 10px;
	}
	.sub-banner li {
		float: left;
		width: 33.33333%;
		height: 93px;
		border: 1px solid #E8E8E8;
		border-right: 0;
	}
	.sub-banner li:hover {
		border: 1px solid #512b2b;
		border-right: 0;
	}
	.sub-banner li:last-child {
		border-right: 1px solid #E8E8E8;
	}
	.sub-banner li:last-child:hover {
		border-right: 1px solid #512b2b;
	}
	.sub-banner li img {
		width: 241px;
		height: 91px;
	}
	/****************************************************************************************/
	/*                                   首页职位分类                                       */
	/****************************************************************************************/

	.menu_left {
		width: 140px;
		float: left;
		border-right: 1px solid #D3D4D5;
		z-index: 11;
		margin-right: 10px;
	}
	.menu_left dl,
	.menu_left dd,
	.menu_left dt {
		margin: 0;
		padding: 0;
		border: 0;
	}
	.menu_left > .ico_arrow_top {
		border-top: 40px solid #de5757;
		position: fixed;
		width: 6px;
		right: 50%;
		top: 105px;
		left: 181px;
		z-index: 13;
	}
	.menu_left > .ico_arrow {
		border-top: 6px solid #de5757;
		border-left: 6px solid #F1F3F4;
		position: fixed;
		width: 1px;
		right: 50%;
		top: 145px;
		left: 181px;
		z-index: 13;
	}
	.menu_left > dl {
		text-align: center;
		background-color: #FFF;
	}
	.menu_left > dl > dt {
		line-height: 38px;
		background-color: #de5757;
		color: #FFF;
	}
	.menu_left > dl > dd {
		line-height: 33px;
		background-color: #FFF;
		border-left: 1px solid #BBBBBB;
		border-bottom: 1px solid #DEDEDE;
		margin: 0;
		padding-left: 10px;
	}
	.menu_left > dl > dd.category_101 {
		border-bottom: 1px solid #BBBBBB;
	}
	.menu_left > dl > dd.on {
		border-left: 1px solid #de5757;
		border-bottom: 1px solid #de5757;
		padding-left: 10px;
		margin: 0;
		z-index: 13;
		position: relative;
	}
	.menu_left > dl > dd.on-prev {
		border-bottom: 1px solid #de5757;
	}
	.menu_left > dl > dd > a {
		display: block;
		border: 1px solid #FFF;
		background-color: #FFF;
		text-align: left;
	}
	.menu_left > dl > dd.on a {
		width: 129px;
	}
	.menu_left_ico1 {
		background-position: 0 -46px; width: 24px;
		height: 24px; vertical-align: middle;
		margin-top: -4px;
	}
	.menu_sub {
		position: absolute;
		margin-left: 139px;
		width: 420px;
		background-color: #FFF;
		text-align: left;
		border: 1px solid #de5757;
		padding: 15px;
		margin-top: -37px;
		z-index: 12;
	}
	.menu_sub > dl.line_b {
		border-bottom: 1px solid #DEDEDE;
	}
	.menu_sub > dl.line_b a {
		color: #666;
	}
	.menu_sub > dl.line_b a:focus,
	.menu_sub > dl.line_b a:hover {
		color: #de5757;
	}
	.menu_sub > dl > dt {
		color: #000;
		font-weight: 700; line-height: 30px;
	}
	.menu_sub > dl > dd {
		color: #DDD;
		padding-bottom: 10px;
		line-height: 25px;
	}
	.menu_sub > dl > dd > a {
		margin-right: 10px;
		white-space: normal;
		border-left: 1px solid #DEDEDE;
		padding-left: 10px;
		word-wrap: break-word;
	}
	/****************************************************************************************/
	/*                                       首页                                           */
	/****************************************************************************************/

	.box-job-category li {
		padding-bottom: 4px;
	}
	.box-job-category li:hover {
		opacity: 0.8;
	}
	.box-job-category li:last-child {
		padding-bottom: 0;
	}
	.box-follow-us {
		text-align: left;
	}
	.box-follow-us li {
		border-bottom: 1px solid #E0E0E0;
		text-align: center;
	}
	.box-follow-us li:last-child {
		border-bottom: none;
	}
	.follow-us-weixin > img {
		width: 190px;
		height: 190px;
	}
	.follow-us-weibo {
		padding: 6px 0 6px 6px;
	}
	.follow-us-weibo > img {
		width: 50px;
		height: 50px;
		display: inline-block;
		padding-right: 3px;
	}
	.follow-us-weibo > div {
		display: inline-block;
		vertical-align: top;
	}
	/* 针对新浪微博的关注组件 */
	.follow-us-weibo > div *,
	.follow-us-weibo > div *:before,
	.follow-us-weibo > div *:after {
		-webkit-box-sizing: content-box;
		-moz-box-sizing: content-box;
		box-sizing: content-box;
	}
	.WB_follow_ex .follow_btn,
	.WB_follow_ex .follow_data,
	.WB_FB_show {
		margin-top: 4px;
	}
	.WB_follow_ex .follow_text {
		width: 40px;
	}
	.box-hot-wei-user {
		padding: 8px;
		text-align: left;
	}
	.box-hot-wei-user li {
		display: inline-block;
		margin-top: 5px;
	}
	.box-hot-wei-user .wei-user-logo {
		width: 90px;
		height: 90px;
	}
	.box-hot-wei-user .wei-user-logo:nth-child(2n) {
		margin-left: 6px;
	}
	.job-section {
		background-color: #FFF;
		margin-bottom: 10px;
		border: 1px solid #D3D4D5;
	}
	.job-section-nav {
		text-align: left;
		border-bottom: 2px solid #de5757;
		padding: 12px 12px 6px 12px;
		background-color: #FFF;
	}
	.job-section-nav > span {
		border-left: 5px solid #F63;
		padding-left: 5px;
		font-size: 18px;
	}
	.job-section-nav ul {
		float: right;
	}
	.job-section-nav li {
		float: left;
		padding: 6px 12px 6px 12px;
		margin: 0 1px;
	}
	.job-section-nav li.on,
	.job-section-nav li:hover,
	.job-section-nav li:active {
		background-color: #de5757;
	}
	.job-section-nav li.on > a,
	.job-section-nav li:hover > a,
	.job-section-nav li:active > a {
		color: #FFF;
	}
	/****************************************************************************************/
	/*                                     职位列表                                         */
	/****************************************************************************************/

	.job-list {
	}
	.job-list li {
		padding: 12px 20px 12px 12px;
		text-align: left;
		border-bottom: 1px solid #E0E0E0;
	}
	.job-list.hide-last-border li:last-child {
		border-bottom: none;
	}
	.job-list li:hover {
		background-color: #F2F2F2;
	}
	.job-list li.load-more {
		text-align: center;
	}
	.job-list li.load-more a {
		padding: 10px 330px;
	}
	.job-list .job-title {
		text-overflow: ellipsis;
		overflow: hidden;
		white-space: nowrap;
		font-size: 1.17em;
		margin-bottom: 4px;
	}
	.job-list > li > p > span {
		margin-right: 17px;
	}
	.job-list .right {
		float: right;
		text-align: right;
	}
	.job-list .right strong {
		display: block;
		font-size: 18px;
		color: #FF6633;
	}
	.job-list .wei-user-logo {
		margin-right: 15px;
	}
	.job-list-loading {
		padding-top: 100px;
		text-align: center;
	}
	.job-list-loading span {
		vertical-align: middle;
		font-size: 20px;
		padding-left: 10px;
	}
	/****************************************************************************************/
	/*                                     企业列表                                         */
	/****************************************************************************************/

	.wei-user-list {
	}
	.wei-user-list li {
		padding: 12px 20px 12px 12px;
		text-align: left;
		border-bottom: 1px solid #E0E0E0;
		min-height: 112px;
	}
	.wei-user-list.hide-last-border li:last-child {
		border-bottom: none;
	}
	.wei-user-list li:hover {
		background-color: #F2F2F2;
	}
	.wei-user-list h3 {
		margin-top: -4px;
	}
	.wei-user-list h3 .small {
		font-size: 80%;
	}
	.wei-user-list > li > p > span {
		margin-right: 20px;
	}
	.wei-user-list .wei-user-logo {
		width: 90px;
		height: 90px;
		margin-right: 15px;
	}
	.wei-user-list .wei-user-logo img {
		width: 90px;
		height: 90px;
	}
	/****************************************************************************************/
	/*                                       简历                                           */
	/****************************************************************************************/

	.resume_job {
		background-color: #FFF;
		border: 1px solid #D3D4D5;
		margin: 20px 0;
		padding: 20px 30px;
	}
	.resume_job .wei-user-logo {
		float: left;
		width: 60px;
		height: 60px;
		margin: 5px 20px 0 0;
		border: 1px solid #D3D4D5;
	}
	.resume_job p {
		font-size: 16px;
		line-height: 150%;
		margin: 4px 0;
	}
	.resume_job .message {
		padding: 20px 16px 0 0;
	}
	.resume_header {
		margin: 20px 0;
	}
	.resume_header > span {
		float: left;
		margin-top: -2px;
		font-size: 16px;
	}
	.resume_header > .btn {
		float: right;
		margin-top: -6px;
		margin-right: 5px;
	}
	.resume_header .progress {
		float: left;
		width: 500px;
		background-color: #EBEBEB;
	}
	.resume {
		background-color: #FFF;
		border: 1px solid #D3D4D5;
		margin-top: 20px;
	}
	.resume_switcher {
		background-color: #DBDFE2;
		height: 60px;
	}
	.resume_switcher li {
		float: left;
		list-style-type: none;
		width: 50%;
		text-align: center;
	}
	.resume_switcher li a {
		display: block;
		line-height: 60px;
		font-size: 30px;
	}
	.resume_switcher li a.on {
		background-color: #de5757;
		color: #FFF;
	}
	.resume_nav {
		background-color: #EAEAEA;
		height: 40px;
		border: 1px solid #DEDEDE;
	}
	.resume_nav li {
		float: left;
		list-style-type: none;
		text-align: center;
	}
	.resume_nav li a {
		line-height: 35px;
		display: block;
		padding: 0 15px;
		border-right: 1px solid #DEDEDE;
		margin: 3px 0;
	}
	.resume_nav li:last-child a {
		border-right: none;
	}
	.resume_nav li a.on {
		color: #d35757;
		background-color: #FFFFFF;
		border-right: 1px solid #DEDEDE;
		padding: 3px 15px;
		margin: 0;
	}
	.resume_title {
		border-bottom: 1px solid #DDD;
		padding-bottom: 6px;
	}
	.resume_title h2 {
		border-bottom: 8px solid #de5757;
		width: 86px;
		padding: 0 2px;
		display: inline;
	}
	.resume_title i {
		font-size: 30px;
		margin-right: 20px;
	}
	.resume_content {
		margin: 30px;
	}
	.resume_content form {
		margin: 30px 0;
	}
	.resume_item_list {
		margin-top: 30px;
	}
	.resume_item_list li {
		margin: 20px 20px;
		border-left: 1px solid #de5757;
		padding-left: 20px;
	}
	.resume_item_list li.education {
		font-size: 15px;
	}
	.resume_item_list li h3 {
		font-size: 16px;
		display: inline;
	}
	.resume_item_list li p {
		margin-top: 5px;
		line-height: 150%;
	}
	.resume_btn_large {
		width: 100%;
		height: 50px;
		font-size: 27px;
	}
	.resume_toolbar {
		position: absolute;
		right: 0;
		top: 60px;
	}
	/* 简历打印 */
	@media print {
		.resume {
			width: 100%;
		}
		.resume_toolbar,
		.mtop,
		.header,
		.footer,
		#toast-container {
			display: none;
		}
		.header .post span {
			display: block;
		}
		.header .logo {
			padding-left: 10px;
		}
	}
	/****************************************************************************************/
	/*                                     极速投递                                         */
	/****************************************************************************************/

	.flash-apply {
		background-color: #FFF;
		border: 1px solid #D3D4D5;
		padding: 30px;
		margin: 0 0 20px 0;
	}
	.flash-apply h1 {
		text-align: left;
	}
	.flash-apply-form {
		border-right: 1px solid #D3D4D5;
	}
	.flash-apply-form legend,
	.flash-apply-login legend {
		text-align: left;
	}
	/****************************************************************************************/
	/*                                 职位/企业的搜索提示                                  */
	/****************************************************************************************/

	.empty_search_tip {
		background-color: #FFF;
		padding: 20px;
		border-bottom: 1px solid #E0E0E0;
	}
	.empty_search_tip img {
		width: 55px;
		height: 55px;
	}
	.empty_search_tip span {
		background-color: #F0F0F0;
		font-size: 16px;
		color: #999;
		margin-left: 5px;
		padding: 5px;
		vertical-align: middle;
	}
	.promotion-tip {
		background-color: #FFF;
		padding: 20px;
		border-bottom: 1px solid #E0E0E0;
	}
	.promotion-tip img {
		width: 55px;
		height: 55px;
	}
	.promotion-tip span {
		background-color: #FFF;
		font-size: 20px;
		color: #7ABD54;
		margin-left: 5px;
		padding: 5px;
		vertical-align: middle;
	}
	.promotion-tip span i:before {
		vertical-align: middle;
		font-size: 30px;
	}
	/****************************************************************************************/
	/*                                     site notice                                      */
	/****************************************************************************************/

	#site_notice {
		text-shadow: none;
		background: #D9EDF7;
		color: #8f3131;
		height: 50px;
		line-height: 48px;
		font-size: 14px;
	}
	/****************************************************************************************/
	/*                                       toast                                          */
	/****************************************************************************************/

	#toast-container .toast-message {
		text-align: left;
	}
	#toast-container .toast-info {
		background-color: #de5757;
	}
	.toast-top-right {
		top: 40px;
	}
	/****************************************************************************************/
	/*                                   CommentWidget                                      */
	/****************************************************************************************/

	.CommentWidget .comment_item {
		/* overflow: hidden; */
		border-bottom: 1px solid #E0E0E0;
		padding: 5px 0 10px 0;
		margin: 15px 0;
	}
	.CommentWidget .comment_item .logo {
		text-align: center;
		width: 48px;
		height: 48px;
		float: left;
		margin-left: 1px;
		box-shadow: 0 0 3px #999999;
	}
	.CommentWidget .comment_item .reply {
		padding-right: 15px;
		text-align: right;
		height: 18px;
	}
	.CommentWidget dd {
		margin-left: 65px;
	}
	.CommentWidget dd h4 em {
		font-weight: 100;
		float: right;
		padding-right: 15px;
	}
	.CommentWidget dd p {
		line-height: 20px;
		margin: 5px 0;
	}
	.CommentWidget dd p.comment_quote {
		border-left: 1px solid #de5757;
		padding-left: 15px;
	}
	.CommentWidget .comment_form {
		font-size: 14px;
		position: relative;
	}
	.CommentWidget .comment_form .close_button {
		float: right;
		margin: 0 5px;
	}
	.CommentWidget .comment_form textarea {
		padding: 6px;
		width: 98%;
	}
	.CommentWidget .comment_form dt {
		margin-bottom: 10px;
		font-size: 16px;
	}
	.CommentWidget .comment_form dd {
		margin: 10px 0;
	}
	.CommentWidget .comment_form dd label {
		width: 55px;
		float: left;
		line-height: 30px;
	}
	.CommentWidget .comment_form .comment_quote {
		background-color: #EEEEEE;
		padding: 10px 5px;
	}
	.CommentWidget .comment_form .login_tip {
		background-color: #F8F8F8;
		padding: 20px;
		width: 80%;
		text-align: center;
		position: absolute;
		top: 50px;
		left: 65px;
	}
	/****************************************************************************************/
	/*                                PromotedAccountWidget                                 */
	/****************************************************************************************/

	.PromotedAccountWidget {
		width: 120px;
		background-color: #FFF;
		position: fixed;
		bottom: 50%;
		left: 50%;
		margin-left: 500px;
		margin-bottom: -170px;
		box-shadow: 0 0 3px #999999;
	}
	.PromotedAccountWidget h3 {
		background-color: #F0F0F0;
		line-height: 30px;
		padding-left: 10px;
		border-bottom: 1px solid #DADEE9;
		text-align: left;
		font-size: 14px;
	}
	.PromotedAccountWidget img {
		width: 100px;
		height: 100px;
		margin-right: 10px;
		padding-top: 10px;
		float: right;
	}
	.PromotedAccountWidget p {
		line-height: 26px;
	}
	.PromotedAccountWidget ul {
		padding-bottom: 10px;
	}
	.PromotedAccountWidget .btn {
		min-width: 80px;
		width: 80px;
		margin-top: 5px;
		color: #de5757;
	}
	/****************************************************************************************/
	/*                                PromotedAccountWidget                                 */
	/****************************************************************************************/

	#CategoryTreeWidget {
		position: absolute;
		top: 0;
		left: 170px;
		width: 50px;
		overflow: visible;
		text-align: center;
		background-color: #3f2222;
		z-index: 999;
	}
	#CategoryTreeWidget > h3 .fa {
		font-size: 14px;
	}
	#CategoryTreeWidget .category_wrap {
		width: 220px;
		/*height: 403px;*/
		margin-left: -170px;
		background-color: #FFF;
		text-align: left;
	}
	#CategoryTreeWidget .category_wrap > ul {
		border-right: 1px solid #512b2b;
		border-left: 1px solid #512b2b;
	}
	#CategoryTreeWidget .category_wrap > ul > li {
		padding: 10px;
		height: 67px;
		border-bottom: 1px solid #E8E8E8;
		position: relative;
	}
	#CategoryTreeWidget .category_wrap > ul > li:last-child {
		border-bottom: 1px solid #512b2b;
	}
	#CategoryTreeWidget .category_wrap > ul > li.prev {
		border-bottom: 1px solid #512b2b;
	}
	#CategoryTreeWidget .category_wrap > ul > li.on {
		border-bottom: 1px solid #512b2b;
	}
	#CategoryTreeWidget .category_wrap .category {
		position: relative;
	}
	#CategoryTreeWidget .category_wrap h4 {
		font-size: 16px;
		line-height: 24px;
	}
	#CategoryTreeWidget .category_wrap p {
		font-size: 13px;
		line-height: 22px;
		margin-top: 2px;
	}
	#CategoryTreeWidget .category_wrap .category p a {
		display: inline-block;
		margin-right: 5px;
	}
	#CategoryTreeWidget .category_wrap .category div.icon-right {
		position: absolute;
		top: 0;
		right: 0;
	}
	#CategoryTreeWidget .sub_category {
		background-color: #FFF;
		padding: 0 10px;
		position: absolute;
		top: -1px;
		left: 218px;
		border: 1px solid #512b2b;
		width: 430px;
	}
	#CategoryTreeWidget .sub_category li {
		border-bottom: 1px solid #E8E8E8;
		padding: 10px 0;
	}
	#CategoryTreeWidget .sub_category p a {
		display: inline-block;
		margin-right: 10px;
	}
	#CategoryTreeWidget .sub_category .mask {
		position: absolute;
		top: 0;
		left: -1px;
		background-color: #FFF;
		height: 66px;
	}
	/****************************************************************************************/
	/*                                 UserDashboardWidget                                  */
	/****************************************************************************************/

	#UserDashboardWidgetLogin {
		text-align: left;
		padding: 10px;
	}
	#UserDashboardWidgetLogin .btn {
		width: 100%;
	}
	#UserDashboardWidgetLogin .register {
		text-align: right;
		margin: 10px 0;
	}
	#UserDashboardWidgetLogin .checkbox {
		margin: 12px 0;
	}
	#UserDashboardWidgetLogin form legend {
		border-bottom: 0;
		font-size: 18px;
	}
	#UserDashboardWidgetLogin form input,
	#UserDashboardWidgetLogin .btn {
		border-radius: 0;
	}
	#UserDashboardWidgetLogin > div > label {
		font-weight: normal;
		margin-bottom: 7px;
	}
	#UserDashboardWidgetLogin hr {
		margin: 12px 0;
	}
	#UserDashboardWidget {
		padding: 10px;
	}
	#UserDashboardWidget legend {
		text-align: left;
		border-bottom: 0;
		margin-bottom: 18px;
		font-size: 16px;
	}
	#UserDashboardWidget .logo {
		text-align: center;
	}
	#UserDashboardWidget .logo img {
		width: 100px;
		height: 100px;
	}
	#UserDashboardWidget .logo label {
		display: block;
		overflow: hidden;
		text-overflow: ellipsis;
		white-space: nowrap;
		margin-top: 10px;
	}
	#UserDashboardWidget .menu a {
		display: inline-block;
		margin-top: 10px;
		width: 88px;
		height: 88px;
		border: 1px solid #E8E8E8;
	}
	#UserDashboardWidget .menu a:nth-child(2n) {
		margin-left: 10px;
	}
	#UserDashboardWidget .menu a:hover {
		border: 1px solid #512b2b;
	}
	#UserDashboardWidget .menu a i {
		margin-top: 15px;
	}
	#UserDashboardWidget .menu a span {
		display: block;
		margin-top: 10px;
	}
	/****************************************************************************************/
	/*                                     show_logo_pop                                    */
	/****************************************************************************************/

	#show_logo_pop {
		width: 600px;
	}
	#show_logo_pop .description {
		margin: 30px;
		text-align: center;
	}
	#show_logo_pop .description p {
		margin: 20px;
		font-size: 16px;
	}
	#show_logo_pop .button-group {
		margin: 20px;
		text-align: center;
	}
	.photo-flow {
	}
	.photo-flow:before {
	}
	.photo-flow:after {
		content: '';
		display: block;
		clear: both;
	}
	.photo {
		display: inline-block;
		margin: 6px;
		position: relative;
		width: 184px;
		text-align: center;
		float: left;
	}
	.photo img {
		width: 184px;
		height: 138px;
	}
	.photo .overlay {
		position: absolute;
		top: 35%;
		width: 80%;
		margin-left: 10%;
		text-align: center;
	}
	.photo .overlay .progress-bar {
		min-width: 5px;
	}
	.photo .content {
		height: 138px;
		background-color: #EEE;
	}
	.photo .content a {
		display: block;
		width: 100%;
		height: 100%;
	}
	.photo .content .fa {
		line-height: 138px;
	}
	.photo .below {
		margin-top: 5px;
		text-overflow: ellipsis;
		overflow: hidden;
		white-space: nowrap;
	}
	.photo .top-right {
		position: absolute;
		top: 10px;
		right: 10px;
	}
	.photo .top-left {
		position: absolute;
		top: 10px;
		left: 10px;
	}
	.photo .top-right .fa,
	.photo .top-left .fa {
		font-size: 20px;
	}
	/*! Badge */

	.badge-1212 {
		background-color: #F55451;
		border-radius: 2px;
		color: #FFF;
		padding: 2px 5px;
		display: inline-block;
		margin-left: 5px;
		font-size: 0.8em;
	}
	a.badge-1212:hover {
		color: #FFF;
		opacity: 0.8;
	}
	/***************************************** 未整理 ********************************************/

	/* Color */
	.c999, a.c999:link, a.c999:visited { color: #999; !important }
	.cBlue, a.cBlue:link, a.cBlue:visited { color: #ad3636; !important }
	.cRed, a.cRed:link, a.cRed:visited { color: #D40000 !important }
	.cOrange, a.cOrange:link, a.cOrange:visited { color: #FF6633 !important }
	/* bgColor */
	/* line */
	.line_top { border-top: 1px solid #DEDEDE }
	/* Font  */
	.f12px { font-size: 12px; }
	.f14px { font-size: 14px; }
	.f16px { font-size: 16px; }
	.f18px { font-size: 18px; }
	.f20px { font-size: 20px; line-height: 170%; color: #6E6E6E }
	.f24px { font-size: 24px; line-height: 170%; color: #6E6E6E }
	/* Other */
	.left { float: left !important }
	.right { float: right !important }
	.clear { clear: both !important }
	.clearL { clear: left !important }
	.ll { float: left; text-align: left; }
	.lc { float: left; text-align: center; }
	.lr { float: left; text-align: right; }
	.fn { float: none; }
	.c { clear: both; font-size: 1px; height: 0; line-height: 0; visibility: hidden; }
	.alR { text-align: right !important }
	.alL { text-align: left !important }
	.alC { text-align: center !important }
	.alM { vertical-align: middle !important }
	.p25 { padding: 25px; }
	.p20 { padding: 20px; }
	.pl15 { padding-left: 15px; }
	.pl20 { padding-left: 20px; }
	.pl25 { padding-left: 25px; }
	.pb0 { padding-bottom: 0; }
	.pt0 { padding-top: 0; }
	.lh45 { line-height: 45px; }
	.mr30 { margin-right: 30px }
	.OverH { overflow: hidden; text-overflow: ellipsis; white-space: nowrap; }
	.hand { cursor: pointer; }
	.ico { background: url(../../images/ico.png) no-repeat 0 0; display: inline-block; }
	.ico_tuijian { background-position: -0 0; width: 20px; height: 20px; vertical-align: middle; margin-top: -4px; }
	.ico_collect { background-position: -23px 0; width: 20px; height: 20px; vertical-align: middle; margin-top: -4px; }
	/* layout */

	/* 条件筛选 */
	.sortbar { background-color: #EEEEEE; height: 30px; line-height: 30px; padding: 0 15px 0 5px; }
	.sortbar li { border-right: 1px solid #E0E0E0; }
	.sortbar_btns { }
	.sortbar_btns li { float: left; }
	.sortbar_btns li a { padding: 0 10px; color: #464646 }
	.ico_sortbar_btns { background: url(../../images/ico_sortbar_btns.png) no-repeat 1px 1px; display: inline-block; font-size: 12px; width: 10px; height: 10px; line-height: 10px; vertical-align: middle; margin-left: 4px; }
	.ico_sortbar_btns_top1 { background-position: 1px 1px }
	.ico_sortbar_btns_top2 { background-position: -39px 1px }
	.ico_sortbar_btns_btm1 { background-position: -19px 1px }
	.ico_sortbar_btns_btm2 { background-position: -59px 1px }
	.job_list_ad { float: right; }
	.job_list_ad dt { font-size: 14px; font-weight: 700; line-height: 25px; }
	.job_list_ad dd { padding: 8px 0; }
	.job_list { }
	.job_list li { padding: 15px 20px 15px 5px; border-bottom: 1px solid #E0E0E0 }
	.job_list li:hover { background-color: #F2F2F2 }
	.job_list li > h3 { line-height: 20px; margin-bottom: 10px; }
	.job_list li > p { line-height: 22px; font-size: 12px; color: #808080 }
	.job_list li > p > span { margin-right: 15px; }
	.job_list_li_r { float: right;; text-align: right }
	.job_list_li_r a { padding: 0 5px; }
	.job_list_li_r strong { margin-top: 10px; display: block }
	.ico_praise, .ico_comment { font-size: 12px; width: 20px; height: 20px; line-height: 20px; vertical-align: middle; margin-right: 5px }
	.ico_comment { background-position: 0 -20px; }
	.search_top_tip { background-color: #FFF6D0; line-height: 40px; font-size: 14px; text-indent: 10px; margin: 10px auto; box-shadow: 0 0 3px #999999; *border: 1px solid #D3D4D5 }
	.list_top_tit {
		line-height: 40px;
		font-size: 14px;
		border-bottom: 1px solid #DEDEDE;
		height: 40px;
		background-color: #FFF;
	}
	.job_search { text-align: left; padding: 15px 20px; }
	.page_sort { line-height: 20px; padding: 5px 0; margin: 0; border: 0; }
	.page_sort dt { color: #999; font-weight: bold; display: inline; padding-right: 10px; font-size: 14px }
	.page_sort dd { margin-right: 5px; display: inline; padding: 2px; line-height: 25px }
	.page_sort dd.on { background-color: #d95656; padding: 2px 5px; }
	.page_sort dd.on a { color: #FFF }
	.page_sort_sub { margin: 0 0 0 38px; line-height: 20px; background-color: #F3F3F3; padding: 2px 5px; }
	.page_sort_sub dt { color: #666; font-weight: bold; display: inline-block; padding-right: 10px; font-size: 14px; width: 85px; }
	.page_sort_sub dt a { color: #666 }
	.page_sort_sub dd { margin-right: 5px; display: inline; padding: 2px; line-height: 25px }
	.page_sort_sub dd a { color: #999; }
	.page_sort_sub dd a:focus,
	.page_sort_sub dd a:hover {
		color: #de5757;
	}
	.page_sort_sub dd.on { background-color: #d95656; padding: 2px 5px; }
	.page_sort_sub dd.on a { color: #FFF }
	.crumb { line-height: 40px; font-size: 12px; }
	.h1_tit { font-size: 20px; font-weight: 600; margin-bottom: 20px }
	.main_right_company_info { padding: 5px 15px; }
	.main_right_company_info h4 { padding: 5px 0 }
	.main_right_company_info p { line-height: 25px; }
	.main_right_company_info .tag { display: inline-block; background-color: #E4F2FF; line-height: 30px; padding: 0 5px; margin: 5px 5px 5px 0 }
	.main_right_company_info .wei-user-logo,
	.main_right_company_info .wei-user-logo img,
	.CI_L .wei-user-logo,
	.CI_L .wei-user-logo img {
		width: 180px;
		height: 180px;
	}
	.main_right_list { padding: 0 10px; }
	.main_right_list li { border-bottom: 1px solid #DEDEDE; padding: 10px 0; color: #989898 }
	.main_right_list li h4 { line-height: 30px; }
	.h2_tit { font-size: 18px; line-height: 30px; border-bottom: 1px solid #DEDEDE; display: block; padding-bottom: 10px; }
	.h2_tit em { float: right; font-size: 12px; }
	.company_info_list { overflow: hidden; padding: 10px 0 }
	.company_info_list li { line-height: 35px; width: 30%; float: left; }
	.company_info_list li.right { width: 40%; }
	.company_info_list .salary { font-size: 24px; color: #FF622E; display: block }
	.company_info_tab { background-color: #F1F1F1; height: 40px; border: 1px solid #DEDEDE; }
	.company_info_tab li { float: left; }
	.company_info_tab li.right { padding: 3px; }
	.company_info_tab li a { color: #444444; line-height: 35px; display: block; padding: 0 15px; border-right: 1px solid #DEDEDE; margin: 3px 0; }
	.company_info_tab a.company_info_tab_on { color: #d35757; background-color: #FFFFFF; border-right: 1px solid #DEDEDE; padding: 3px 15px; margin: 0 }
	h2.company_info_tit2 { background-color: #E4F2FF; line-height: 35px; color: #de5757; display: block; margin: 20px 0; font-size: 14px }
	h2.company_info_tit2 img { vertical-align: middle; margin: 0 5px; }
	h3.company_info_tit3 { font-size: 16px; color: #444; line-height: 55px }
	.company_info_job_list { }
	.company_info_job_list li {
		background-color: #EEEEEE;
		border-left: 5px solid #de5757;
		margin-bottom: 10px;
		padding: 5px 0 5px 10px;
	}
	.company_info_job_list li:hover {
		background-color: #E8E8E8;
	}
	.company_info_job_list li h3 { font-size: 18px; font-weight: 100; line-height: 30px; }
	.company_info_job_list li p { font-size: 14px; margin: 0; color: #999 }
	.company_info_job_list li .money { float: right; margin: 10px 5px 0 0; }
	.company_info_job_list li .money strong { font-size: 22px; }
	.CI_list2 { }
	.CI_L { width: 190px; float: left; margin-top: -50px; }
	.CI_logo { width: 180px; box-shadow: 0 0 3px #999999; margin-bottom: 15px; *border: 1px solid #D3D4D5; background-color: white; }
	.CI_R { margin-left: 200px; }
	.CI_R p { margin: 10px 40px -3px 0; }
	.CI_R h1 { font-size: 24px; line-height: 40px; }
	.CI_R p.CI_list span { margin-right: 25px; }
	.CI_R p.tag2 a { display: inline-block; margin-right: 5px; line-height: 30px; padding: 0 5px; background-color: #E4F2FF }
	/* 翻页 */
	.pages { padding: 17px 15px 36px 0; text-align: right; height: 26px; }
	.pages a { color: black; margin-right: 2px; padding: 2px 4px; border: 1px solid #DEDEDE; }
	.pages a:hover,
	.pages a:active {
		border: 1px solid #C1C1C1;
	}
	.pages span.current { border: 1px solid #de5757; FONT-WEIGHT: 700; COLOR: #de5757; MARGIN-RIGHT: 2px; padding: 2px 7px; background: #DDF0FF; }
	.pages span.disabled { COLOR: #CCC; MARGIN-RIGHT: 2px; padding: 2px 7px; border: 1px solid #DDF0FF; }
	a.BR_ico1 { background-position: center -195px; }
	a.BR_ico2 { background-position: center -240px; }
	a.BR_ico3 { background-position: center -295px; }
	a.BR_ico4 { background-position: center -340px; }
	a.BR_ico1:hover { background-position: center 5px; }
	a.BR_ico2:hover { background-position: center -41px; }
	a.BR_ico3:hover { background-position: center -95px; }
	a.BR_ico4:hover { background-position: center -140px; }
	.P_tit { }
	.P_tit h2 { font-size: 20px; font-weight: 600; padding-bottom: 10px; }
	.P_tit h2 .r { font-size: 14px; float: right; font-weight: 100 }
	.pic_right { text-align: center; float: right; margin-top: 45px; }
	.pic_right img { display: block; width: 150px; height: 150px; border: 5px solid #DDD }
	.input_list ul { color: #444; }
	.input_list ul li { margin: 25px 0; font-size: 16px }
	.input_list ul li label { width: 90px; display: inline-block; }
	.resume_list { }
	.resume_list dt { line-height: 35px; }
	.resume_list dd { margin: 20px 40px; font-size: 16px; border: 1px solid #DDD; border-left: 5px solid #de5757; padding: 15px; }
	.resume_list dd span.r { font-size: 14px; float: right; line-height: 25px; }
	.resume_list dd span.r a { margin-right: 10px; }
	.tab2 { height: 37px; border-bottom: 1px solid #de5757; }
	.tab2 li { float: left; margin-left: -1px; }
	.tab2 li.right { padding: 3px; }
	.tab2 li a { line-height: 37px; display: block; padding: 0 15px; border: 1px solid #BDBDBD; border-bottom: 0 none; }
	.tab2 a.tab2_on { line-height: 35px; background-color: #FFF; border-top: 3px solid #de5757; border-right: 1px solid #de5757; border-left: 1px solid #de5757; margin: 0; position: relative; }
	.list2 { }
	.list2 li { border-bottom: 1px solid #BDBDBD; padding: 20px 15px 25px; }
	.list2 li.on { background-color: #E4F2FF; }
	.list2 li h4 { font-size: 14px; line-height: 25px; }
	.list2 li p { }
	.status_G { background-color: #8ABF34;
		border-radius: 3px;
		color: #FFF;
		float: right;
		margin-top: 10px;
		padding: 0 10px;
		line-height: 25px; }
	.status_R { background-color: #ff6666; border-radius: 3px;
		color: #FFF;
		float: right;
		margin-top: 10px;
		padding: 0 10px;
		line-height: 25px; }
</style>
<div class="header" >
	<div class="nav_box" >   <!--   style="background-color: brown"-->
		<div class="nav_bar">
			<div class="nav_logo"><a href="<?php echo U('Home/Index/Index');?>"><img src="/Public/images/website_logo.png"/></a></div>
			<div class="nav_search">
				<form method="get" action="<?php echo ($search["url"]); ?>" autocomplete="off">
					<input class="form-control" style="border: none;box-shadow: none;" type="text" name="keyword" value="<?php echo ($keyword); ?>" placeholder="<?php echo ($search["placeholder"]); ?>"  >
					<button type="submit" class="btn btn-link"><span class="fa"><img src="/Public/images/shousuo.png"/></span></button>
				</form>
			</div>
			<!-- 导航栏目 -->
			<ul class="nav_items">
				<?php if(is_array($nav)): foreach($nav as $key=>$v): ?><li >  <!--<?php echo ($v["on"]); ?>--> <a href="<?php echo ($v["url"]); ?>"  class="hover-color" ><?php echo ($v["name"]); ?></a></li><?php endforeach; endif; ?>
			</ul>
			<?php if(empty($_SESSION['user'])): ?><!--未登录-->
				<ul class="list-unstyled">
					<li><a href="<?php echo U('Home/Login/login');?>" class="text-white">免费发布职位</a> &nbsp;&nbsp;|&nbsp;&nbsp;
						<a href="<?php echo U('Home/Login/login');?>" class="text-white">登录</a> &nbsp;&nbsp;|&nbsp;&nbsp;
						<a href="<?php echo U('Home/Register/index');?>" class="text-white">注册</a> &nbsp;&nbsp;|&nbsp;&nbsp;
					</li>
				</ul>
				<?php else: ?>
				<?php if(($user["usertype"]) == "1"): ?><!--个人用户-->
					<ul class="nav_right">
						<li class="dropdown-nav dropdown">
							<a href="" class="dropdown-toggle dropdown-toggle-nav" >
								<?php echo ($user["alias"]); ?>&nbsp;<span class="caret"></span></a>
							<ul class="dropdown-menu nav-menu" role="menu">
								<li><a href="<?php echo U('User/Resume/index');?>"><i class="fa fa-file-word-o"></i> 我的简历</a></li>

								<li><a href="<?php echo U('User/History/index');?>"><i class="fa fa-history"></i> 申请历史</a></li>
								<li><a href="<?php echo U('User/PersonalSet/index');?>"><i class="fa fa-user"></i> 账号设置</a></li>
								<li><a href="<?php echo U('Home/Login/logout');?>"><i class="fa fa-sign-out"></i> 退出</a></li>
							</ul>
						</li>
					</ul>
					<?php else: ?>
					<!--企业用户-->
					<ul class=" nav_right">
						<li><a href="<?php echo U('User/Job/add');?>" title="免费发布职位">发布职位</a>
						</li>
						<li>
							<a href="<?php echo U('User/Apply/index?status=1');?>" class="js-data-toggle-tooltip js-drop-btn notifier-number" title="我的通知" data-notifier-number="<?php echo ($apply_num); ?>"><!-- data-notifier-number="5" 此句控制通知数量-->
								<i class="fa"><img src="/Public/images/xiaoxi.png"/></i>
							</a>
						</li>
						<li class="dropdown-nav dropdown ">
							<a href="javascript:void(0)" class="dropdown-toggle-nav">
								<?php echo mb_substr($cname,0,8,'utf-8');?>...<span class="caret"></span>
							</a>
							<ul class="dropdown-menu nav-menu" role="menu">
								<li><a href="<?php echo U('User/Job/index');?>"><i class="fa fa-fw fa-list"></i>&nbsp;职位管理</a>
								</li>
								<li class="js-btn-apply-list"><a href="<?php echo U('User/Apply/index');?>"><i class="fa fa-fw fa-files-o"></i>&nbsp;简历管理&nbsp;
									<span class="text-highlight">(<?php echo ($apply_num); ?>)</span></a>
								</li>
								<li><a href="<?php echo U('User/Company/index');?>"><i
										class="fa fa-fw fa-user"></i>&nbsp;企业资料</a></li>
								<li><a href="<?php echo U('User/AccountSet/index');?>"><i
										class="fa fa-fw fa-gears"></i>&nbsp;账号设置</a></li>
								<li><a href="<?php echo U('Home/Login/logout');?>"><i class="fa fa-fw fa-sign-out"></i>&nbsp;退出</a>
								</li>
							</ul>
						</li>
					</ul><?php endif; endif; ?>
		</div>
	</div>
</div>
<script>
	seajs.use(['$'], function ($) {
		$("li.dropdown-nav").hover(function () {
			$("a.dropdown-toggle-nav").css({"background" : "#3f2222"})
			$("ul.nav-menu").show();
		}, function () {
			setTimeout(function () {
				$("a.dropdown-toggle-nav").css({"background" : "#512c2c"})
				$("ul.nav-menu").hide();
			}, 100);

		})
	})
</script>