<!DOCTYPE html>
<html lang="id">

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Landing Page FIVY</title>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
	<style>
		* {
			box-sizing: border-box;
			margin: 0;
			padding: 0;
		}

		html {
			scroll-behavior: smooth;
		}

		body {
			font-family: 'Poppins', sans-serif;
			background-color: #f9fbfd;
			color: #333;
			line-height: 1.6;
		}

		header {
			position: fixed;
			top: 0;
			left: 0;
			right: 0;
			padding: 15px 30px;
			z-index: 1000;
			background-color: rgba(44, 62, 80, 1);
			/* awal: solid */
			color: white;
			backdrop-filter: blur(10px);
			transition: background-color 1s ease;
		}

		.header-container {
			max-width: 1200px;
			margin: auto;
			display: flex;
			justify-content: space-between;
			align-items: center;
			flex-wrap: wrap;
			gap: 20px;
		}

		header.scrolled {
			background-color: rgba(18, 46, 73, 0.404);
		}

		#locknav {
			color: rgba(255, 255, 255, 0.475);
			cursor: default;
		}

		.profile-dropdown {
			position: relative;
			display: inline-block;
		}

		.profile-capsule {
			display: flex;
			align-items: center;
			gap: 15px;
			padding: 8px 16px;
			background: white;
			border-radius: 999px;
			box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
			cursor: pointer;
			text-decoration: none;
			transition: background 0.3s ease, box-shadow 0.3s ease;
		}

		.profile-capsule:hover {
			background: #f0f4ff;
			box-shadow: 0 6px 14px rgba(0, 0, 0, 0.12);
		}

		.profile-pic {
			width: 36px;
			height: 36px;
			border-radius: 50%;
			object-fit: cover;
			border: 2px solid #3b5a91;
		}

		.login-button {
			font-weight: 600;
			font-size: 14px;
			color: #2c3e50;
			white-space: nowrap;
		}


		.dropdown-icon {
			font-size: 18px;
			color: #3b5a91;
			transition: transform 0.3s ease;
		}

		.profile-dropdown.open .dropdown-icon {
			transform: rotate(180deg);
		}

		.dropdown-menu {
			position: absolute;
			right: 0;
			top: 110%;
			background: white;
			border-radius: 12px;
			box-shadow: 0 12px 24px rgba(0, 0, 0, 0.1);
			width: 180px;
			padding: 10px 0;
			display: none;
			flex-direction: column;
			z-index: 999;
			animation: fadeInUp 0.3s ease;
		}

		.profile-dropdown.open .dropdown-menu {
			display: flex;
		}

		.dropdown-item {
			padding: 12px 20px;
			display: flex;
			align-items: center;
			gap: 12px;
			font-size: 14px;
			color: #2c3e50;
			text-decoration: none;
			transition: background 0.2s ease;
		}

		.dropdown-item svg {
			width: 18px;
			height: 18px;
			stroke: #3b5a91;
			stroke-width: 2;
		}

		.dropdown-item:hover {
			background: #f0f4ff;
			cursor: pointer;
		}


		.logo {
			font-size: 28px;
			font-weight: 700;
			color: #ffffff;
			text-decoration: none;

		}

		a .logo {
			text-decoration: none;
			color: inherit;
			color: #ffffff;
		}

		a {
			text-decoration: none;
		}


		.menu ul {
			list-style: none;
			display: flex;
			gap: 24px;
		}

		.menu ul li a {
			text-decoration: none;
			color: #ffffff;
			font-weight: 500;
			transition: color 0.3s ease;
		}

		.menu ul li a:hover {
			color: #a7c4ff;
		}

		.hero {
			background: linear-gradient(to right, #89CFF0, #6BA8E5);
			padding: 140px 20px 80px;
			border-radius: 0 0 30px 30px;
			overflow: hidden;
			text-align: center;
		}

		.hero-container {
			max-width: 1000px;
			margin: auto;
			display: flex;
			flex-wrap: wrap;
			align-items: center;
			justify-content: center;
			gap: 40px;
		}

		.hero-image img {
			width: 460px;
			border-radius: 15px;
			-webkit-mask-image: linear-gradient(to bottom, black 50%, rgba(0, 0, 0, 0.5) 80%, transparent 100%);
			mask-image: linear-gradient(to bottom, black 50%, rgba(0, 0, 0, 0.5) 80%, transparent 100%);
		}


		.hero-text {
			max-width: 500px;
		}

		.hero-text h1 {
			font-size: 36px;
			margin-bottom: 15px;
			color: #fff;
		}

		.hero-text p {
			margin-bottom: 20px;
			color: #f0f0f0;
		}


		.hero-container {
			opacity: 0;
			transform: translateY(-50px);
			animation: flyInUp 1s ease-out forwards;
			animation-delay: 0.3s;
		}


		@keyframes flyInUp {
			to {
				opacity: 1;
				transform: translateY(0);
			}
		}

		.features {
			display: flex;
			flex-wrap: wrap;
			justify-content: center;
			gap: 30px;
			padding: 50px 20px;
		}

		.feature {
			background-color: #fff;
			padding: 20px;
			border-radius: 12px;
			text-align: center;
			width: 220px;
			box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
			opacity: 0;
		}


		.from-left {
			transform: translateX(-100px);
			animation: slideInLeft 1s ease-out forwards;
			animation-delay: 0.3s;
		}


		.from-right {
			transform: translateX(100px);
			animation: slideInRight 1s ease-out forwards;
			animation-delay: 0.3s;
		}

		@keyframes slideInLeft {
			to {
				opacity: 1;
				transform: translateX(0);
			}
		}

		@keyframes slideInRight {
			to {
				opacity: 1;
				transform: translateX(0);
			}
		}



		.cta {
			background-color: #fff;
			color: #3b5a91;
			padding: 12px 30px;
			border-radius: 30px;
			text-decoration: none;
			font-weight: bold;
			transition: all 0.3s ease;
			display: inline-block;
			box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
		}

		.cta:hover {
			background-color: #3b5a91;
			color: #fff;
			transform: translateY(-2px);
			box-shadow: 0 6px 16px rgba(0, 0, 0, 0.2);
		}

		.features {
			display: flex;
			flex-wrap: wrap;
			justify-content: center;
			gap: 24px;
			padding: 60px 20px;
			background: #ffffff;
		}

		.feature {
			background: #f0f4ff;
			border-radius: 20px;
			width: 240px;
			text-align: center;
			padding: 30px 20px;
			box-shadow: 0 6px 16px rgba(0, 0, 0, 0.06);
			transition: all 0.3s ease;
		}

		#feature {
			transition: transform 0.3s ease, background-color 0.3s ease, box-shadow 0.3s ease;
			border-radius: 20px;
		}

		#feature:hover {
			transform: translateY(-5px);
			border-radius: 20px;
			box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
			/* bayangan halus dari bawah */
		}

		.icon {
			width: 64px;
			margin-bottom: 12px;
		}


		@keyframes flyInUp {
			from {
				transform: translateY(40px);
				opacity: 0;
			}

			to {
				transform: translateY(0);
				opacity: 1;
			}
		}

		/* === WHY US MODERN SECTION === */
		.why-us-modern {
			background: linear-gradient(to right, #f1f6fd, #ffffff);
			padding: 80px 20px;
			font-family: 'Poppins', sans-serif;
		}

		.why-container-modern {
			display: flex;
			align-items: center;
			justify-content: space-between;
			gap: 60px;
			max-width: 1200px;
			margin: auto;
			flex-wrap: wrap;
		}

		.why-text-modern {
			flex: 1;
			min-width: 320px;
		}

		.why-text-modern h2 {
			font-size: 2.5rem;
			color: #2c3e50;
			margin-bottom: 40px;
			font-weight: 700;
		}

		.why-text-modern h2 span {
			color: #3b82f6;
		}

		.reasons-grid {
			display: grid;
			grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
			gap: 30px;
		}

		.reason-card {
			background: #ffffff;
			border-radius: 16px;
			padding: 30px 20px;
			text-align: center;
			box-shadow: 0 10px 25px rgba(0, 0, 0, 0.06);
			transition: all 0.3s ease;
			position: relative;
		}

		.reason-card:hover {
			transform: translateY(-6px);
			box-shadow: 0 16px 30px rgba(0, 0, 0, 0.08);
		}

		.reason-card img {
			width: 64px;
			height: 64px;
			margin-bottom: 15px;
		}

		.reason-card h4 {
			font-size: 1.2rem;
			color: #1e293b;
			margin-bottom: 10px;
			font-weight: 600;
		}

		.reason-card p {
			font-size: 0.95rem;
			color: #475569;
			line-height: 1.6;
		}

		.why-image-modern {
			flex: 1;
			min-width: 320px;
			text-align: center;
		}

		.why-image-modern img {
			max-width: 100%;
			border-radius: 20px;
			box-shadow: 0 12px 24px rgba(0, 0, 0, 0.1);
			transition: transform 0.4s ease;
		}

		.why-image-modern img:hover {
			transform: scale(1.03);
		}

		/* Responsive */
		@media (max-width: 1024px) {
			.why-container-modern {
				flex-direction: column-reverse;
				text-align: center;
			}

			.why-text-modern h2 {
				font-size: 2rem;
			}

			.reason-card {
				padding: 24px 16px;
			}

			.reason-card img {
				width: 56px;
				height: 56px;
			}
		}



		.extra-cards {
			background: #f4f7fc;
			padding: 60px 20px;
		}

		.cards-container {
			display: flex;
			flex-wrap: wrap;
			gap: 30px;
			justify-content: space-between;
			align-items: stretch;
			margin-top: 40px;
		}

		.card {
			background-color: #ffffff;
			border-radius: 20px;
			box-shadow: 0 6px 20px rgba(0, 0, 0, 0.08);
			padding: 30px;
			flex: 1 1 48%;
			transition: transform 0.3s ease, box-shadow 0.3s ease;
		}

		.card:hover {
			transform: translateY(-6px);
			box-shadow: 0 12px 28px rgba(0, 0, 0, 0.12);
		}

		.alumni-card {
			display: flex;
			flex-direction: row;
			gap: 30px;
		}

		.alumni-left {
			flex: 1;
		}

		.alumni-desc {
			font-size: 14px;
			color: #555;
			margin-bottom: 15px;
		}

		.alumni-bullets {
			padding-left: 0;
			list-style: none;
			font-size: 14px;
			color: #333;
		}

		.alumni-bullets li {
			margin-bottom: 10px;
		}

		.alumni-right {
			flex: 1;
			display: flex;
			flex-direction: column;
			gap: 15px;
		}

		.alumni-item {
			display: flex;
			align-items: center;
			gap: 16px;
			background-color: #f7faff;
			padding: 12px 16px;
			border-radius: 14px;
			transition: all 0.3s ease;
		}

		.alumni-item:hover {
			background-color: #eaf3ff;
			transform: scale(1.02);
		}

		.alumni-item img {
			width: 60px;
			height: 60px;
			border-radius: 50%;
			object-fit: cover;
			box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
		}

		.alumni-info h4 {
			margin: 0;
			font-size: 16px;
			color: #2c3e50;
		}

		.badge {
			display: inline-block;
			font-size: 12px;
			margin-top: 4px;
			padding: 4px 10px;
			border-radius: 20px;
			font-weight: 500;
			color: white;
		}

		.badge.ui {
			background-color: #0066cc;
		}

		.badge.itb {
			background-color: #1c3e8a;
		}

		.badge.ugm {
			background-color: #a62828;
		}


		/* Responsive */
		@media screen and (max-width: 768px) {
			.alumni-card {
				flex-direction: column;
				text-align: center;
			}

			.alumni-right {
				align-items: center;
			}
		}

		.chart-card {
			padding: 32px;
			background-color: #ffffff;
			border-radius: 20px;
			box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
			display: flex;
			flex-direction: column;
			align-items: center;
		}

		.chart {
			display: flex;
			justify-content: space-around;
			align-items: flex-end;
			width: 100%;
			height: 230px;
			/* Lebih tinggi agar batang besar */
			margin-top: 24px;
			position: relative;
		}

		.bar-container {
			position: relative;
			width: 60px;
			height: 100%;
			display: flex;
			flex-direction: column;
			align-items: center;
			justify-content: flex-end;
			border-width: 2px;
			border-color: #ffffff;
			border-style: dashed;
		}

		.bar {
			width: 100%;
			background-color: #3b82f6;
			border-radius: 10px 10px 0 0;
			position: relative;
			transition: height 0.6s ease-in-out;
		}

		.bar-container .label {
			margin-top: 10px;
			font-weight: 500;
			font-size: 14px;
			color: #2c3e50;
		}


		.bar::after {
			content: attr(data-percent);
			position: absolute;
			top: -28px;
			font-size: 14px;
			font-weight: 600;
			color: #2c3e50;
			background: #ffffff;
			padding: 2px 6px;
			border-radius: 6px;
			box-shadow: 0 1px 4px rgba(0, 0, 0, 0.1);
		}

		.label {
			margin-top: 10px;
			font-size: 13px;
			color: #444;
			font-weight: 500;
		}

		@keyframes barGrow {
			0% {
				height: 0%;
			}

			100% {
				height: var(--target-height, 100%);
			}
		}


		@media screen and (max-width: 768px) {
			.chart {
				height: 200px;
			}

			.bar::after {
				font-size: 12px;
			}

			.label {
				font-size: 12px;
			}
		}

		.faq-item {
			background: white;
			margin: 10px 0;
			padding: 16px 20px;
			border-radius: 10px;
			box-shadow: 0 4px 10px rgba(0, 0, 0, 0.08);
			transition: background 0.2s ease;
			overflow: hidden;
		}

		.faq-question {
			display: flex;
			justify-content: space-between;
			align-items: center;
			cursor: pointer;
		}

		.faq-item:hover {
			background: #f0f8ff;
		}

		.faq-item .question {
			font-weight: bold;
			font-size: 16px;
			margin: 0;
		}

		.faq-item .answer {
			margin-top: 10px;
			font-weight: normal;
			color: #333;
			display: none;
		}

		.faq-item.active .answer {
			display: block;
		}

		.faq-item .arrow {
			font-size: 20px;
			color: #888;
			transition: transform 0.3s ease;
		}

		.faq-item.active .arrow {
			transform: rotate(90deg);
		}

		.more {
			text-align: center;
			margin-top: 30px;
		}

		#show-more {
			background-color: #1f79cb;
			color: white;
			font-weight: bold;
			border: none;
			padding: 10px 20px;
			border-radius: 8px;
			cursor: pointer;
		}

		.hidden {
			display: none;
		}

		footer {
			background: #2c3e50;
			color: #ecf0f1;
			padding: 60px 20px 30px;
		}

		.footer-container {
			max-width: 1200px;
			margin: auto;
			display: flex;
			flex-wrap: wrap;
			gap: 40px;
			justify-content: space-between;
		}

		.footer-col {
			flex: 1 1 200px;
		}

		.footer-col h3 {
			margin-bottom: 15px;
			color: #ffffff;
		}

		.footer-col ul {
			list-style: none;
			padding: 0;
		}

		.footer-col ul li {
			margin-bottom: 10px;
		}

		.footer-col ul li a {
			color: #bdc3c7;
			text-decoration: none;
		}

		.footer-col ul li a:hover {
			text-decoration: underline;
		}

		.social-icons {
			display: flex;
			gap: 10px;
			margin-top: 10px;
		}

		.social-icons img {
			width: 32px;
			height: 32px;
		}

		.footer-bottom {
			text-align: center;
			margin-top: 40px;
			color: #95a5a6;
		}

		.contact-form input,
		.contact-form textarea {
			width: 100%;
			padding: 10px;
			margin-bottom: 10px;
			border: none;
			border-radius: 5px;
			font-family: 'Poppins', sans-serif;
		}

		@media screen and (max-width: 768px) {

			.hero-container,
			.why-container,
			.cards-container {
				flex-direction: column;
				text-align: center;
			}

			.menu ul {
				flex-direction: column;
				align-items: center;
			}
		}

		/* Paket Bimbel Section */
		.pricing {
			padding: 60px 20px;
			background-color: #ffffff;
			text-align: center;
		}

		.pricing-title {
			font-size: 28px;
			color: #3b5a91;
			margin-bottom: 40px;
		}

		.pricing-container {
			max-width: 1000px;
			margin: auto;
			display: flex;
			flex-wrap: wrap;
			gap: 30px;
			justify-content: center;
		}

		.price-card {
			background-color: #f9fbfd;
			border-radius: 20px;
			padding: 30px 20px;
			box-shadow: 0 8px 24px rgba(0, 0, 0, 0.06);
			flex: 1 1 300px;
			transition: transform 0.3s ease;
			border-top: 5px solid #3b5a91;
		}

		.price-card:hover {
			transform: translateY(-6px);
		}

		.price-card h3 {
			font-size: 20px;
			margin-bottom: 10px;
			color: #3b5a91;
		}

		.price {
			font-size: 24px;
			font-weight: bold;
			margin-bottom: 20px;
			color: #2c3e50;
		}

		.price-card ul {
			list-style: none;
			padding: 0;
			margin-bottom: 20px;
		}

		.price-card ul li {
			margin-bottom: 10px;
			font-size: 14px;
			color: #555;
		}

		.price-card .cta {
			background-color: #3b5a91;
			color: #ffffff;
			padding: 10px 24px;
			border-radius: 30px;
			text-decoration: none;
			font-weight: bold;
			transition: background-color 0.3s ease;
		}

		.price-card .cta:hover {
			background-color: #2b4775;
		}

		.highlighted {
			background-color: #e6f0ff;
			border-top: 5px solid #4a90e2;
		}

		.faq-section {
			background-color: #f4f7fc;
			padding: 60px 20px;
		}

		.section-title {
			text-align: center;
			font-size: 28px;
			color: #3b5a91;
			font-weight: 600;
			margin-bottom: 40px;
		}

		.faq-container {
			max-width: 800px;
			margin: auto;
		}

		.faq-item {
			background: #ffffff;
			border-radius: 12px;
			margin-bottom: 20px;
			box-shadow: 0 4px 12px rgba(0, 0, 0, 0.03);
			overflow: hidden;
			transition: box-shadow 0.4s ease, transform 0.4s ease;
		}

		.faq-item.active {
			box-shadow: 0 12px 24px rgba(0, 0, 0, 0.08);
			transform: translateY(-2px);
		}

		.faq-toggle {
			display: flex;
			justify-content: space-between;
			align-items: center;
			width: 100%;
			padding: 20px 24px;
			background: none;
			border: none;
			cursor: pointer;
			font-family: 'Poppins', sans-serif;
			font-size: 16px;
			font-weight: 500;
			color: #2c3e50;
			transition: background-color 0.3s ease;
		}

		.faq-toggle:hover {
			background: #eef3fc;
		}

		.faq-icon {
			width: 24px;
			height: 24px;
			transition: transform 0.4s ease;
			transform-origin: center;
		}

		.faq-item.active .faq-icon {
			transform: rotate(180deg);
		}

		.faq-content {
			max-height: 0;
			overflow: hidden;
			opacity: 0;
			padding: 0 24px;
			transition:
				max-height 0.6s ease,
				opacity 0.4s ease,
				padding 0.5s ease;
		}

		.faq-item.active .faq-content {
			max-height: 300px;
			opacity: 1;
			padding: 10px 24px 20px;
		}

		.faq-content p {
			color: #555;
			font-size: 15px;
			line-height: 1.6;
		}


		.faq-item.active .faq-content {
			max-height: 200px;
			opacity: 1;
			padding: 10px 24px 20px;
		}

		.faq-content p {
			color: #555;
			font-size: 15px;
			line-height: 1.6;
		}

		@keyframes bounceOpen {
			0% {
				transform: scale(0.98);
			}

			50% {
				transform: scale(1.01);
			}

			100% {
				transform: scale(1);
			}
		}

		.faq-item.active {
			animation: bounceOpen 0.4s ease;
		}

		.book-section {
			background-color: #f4f8ff;
			padding: 60px 30px;
			text-align: center;
		}

		.book-section .section-title {
			font-size: 2.2em;
			color: #3b5a91;
			margin-bottom: 40px;
			font-weight: 700;
		}

		.book-grid {
			display: grid;
			grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
			gap: 30px;
			justify-content: center;
			align-items: stretch;
		}

		.book-card {
			background: #fff;
			border-radius: 16px;
			padding: 20px;
			transition: all 0.4s ease;
			box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
			display: flex;
			flex-direction: column;
			align-items: center;
			animation: fadeInUp 1s ease;
			position: relative;
		}

		.book-card:hover {
			transform: translateY(-10px) scale(1.03);
			box-shadow: 0 12px 24px rgba(0, 0, 0, 0.12);
		}

		.book-image img {
			width: 120px;
			height: auto;
			margin-bottom: 20px;
		}

		.book-content h3 {
			font-size: 1.2em;
			color: #2c3e50;
			margin-bottom: 10px;
		}

		.book-content p {
			font-size: 0.95em;
			color: #555;
		}

		.more {
			margin-top: 30px;
		}

		.more .cta {
			background-color: #3b5a91;
			color: #fff;
			border: none;
			padding: 12px 28px;
			font-weight: 600;
			border-radius: 8px;
			font-size: 1em;
			cursor: pointer;
			transition: background 0.3s ease;
		}

		.more .cta:hover {
			background-color: #2a4175;
		}

		/* Animasi */
		@keyframes fadeInUp {
			from {
				opacity: 0;
				transform: translateY(30px);
			}

			to {
				opacity: 1;
				transform: translateY(0);
			}
		}
	</style>
	<script>
		document.querySelectorAll('.faq-question').forEach(question => {
			question.addEventListener('click', () => {
				const parent = question.closest('.faq-item');
				parent.classList.toggle('active');
			});
		});
		document.getElementById('show-more').addEventListener('click', function () {
			document.querySelectorAll('.faq-item.hidden').forEach(item => {
				item.classList.remove('hidden');
			});
			this.style.display = 'none';
		});
	</script>
</head>

<body>
	<header>
		<div class="header-container">
			<a href="<?= base_url('dashboard') ?>" style="text-decoration: none;">
				<div class="logo">FIVY</div>
			</a>
			<nav class="menu">
				<ul>
					<li><a href="<?= base_url('dashboard') ?>">Home</a></li>
					<li><a href="<?= base_url('dashboard/bacaan') ?>">Daftar Bacaan</a></li>
					<li>
						<div id="locknav">Latihan Soal</div>
					</li>
					<li>
						<div id="locknav">Try Out</div>
					</li>
				</ul>
			</nav>
			<div class="profile-dropdown" id="profileDropdown">
				<?php if (!$this->session->userdata('id_user')): ?>
				<a href="<?= base_url('auth/login') ?>" class="profile-capsule">
					<span class="login-button">Login</span>
				</a>
				<?php else: ?>
				<div class="dropdown-menu show">
					<!-- tambahkan "show" kalau mau muncul langsung -->
					<a class="dropdown-item" href="<?= base_url('profile') ?>">
						Profile
					</a>
					<a class="dropdown-item" href="<?= base_url('auth/logout') ?>">
						Keluar
					</a>
				</div>
				<?php endif; ?>
			</div>
		</div>
		</div>
	</header>
	<script>
		const header = document.querySelector('header');

		window.addEventListener('scroll', () => {
			if (window.scrollY > 10) {
				header.classList.add('scrolled');
			} else {
				header.classList.remove('scrolled');
			}
		});
	</script>
	<section class="hero">
		<div class="hero-container">
			<div class="hero-image">
				<img src="<?= base_url('assets/images/ban.png') ?>" alt="Siswa Belajar">
			</div>
			<div class="hero-text">
				<h1>Belajar Lebih Mudah & Menyenangkan</h1>
				<p>
					FIVY adalah platform belajar online untuk siswa SMA/SMK yang dirancang agar lebih fleksibel,
					menyenangkan, dan
					bisa diakses kapan pun.
				</p>
				<a href="#buku" class="cta">Mulai Belajar Sekarang</a>
			</div>
		</div>
	</section>

	<section class="features">
		<div id="feature">
			<div class="feature from-left">
				<img src="https://img.icons8.com/fluency/96/book.png" class="icon" alt="Materi" />
				<p>Pembelajaran Adaptif dan Menyenangkan</p>
			</div>
		</div>
		<div id="feature">
			<div class="feature from-left">
				<img src="https://img.icons8.com/fluency/96/classroom.png" class="icon" alt="Kelas" />
				<p>Pendampingan Belajar SMA/SMK</p>
			</div>
		</div>
		<div id="feature">
			<div class="feature from-right">
				<img src="https://img.icons8.com/fluency/96/student-male.png" class="icon" alt="Motivasi" />
				<p>Menumbuhkan Semangat Belajar Siswa</p>
			</div>
		</div>
		<div id="feature">
			<div class="feature from-right">
				<img src="https://img.icons8.com/fluency/96/teacher.png" class="icon" alt="Tutor" />
				<p>Tutor Profesional & Berpengalaman</p>
			</div>
		</div>
	</section>

	<section class="why-us-modern">
		<div class="why-container-modern">
			<div class="why-text-modern">
				<h2>Mengapa Memilih <span>FIVY</span>?</h2>
				<div class="reasons-grid">
					<div class="reason-card">
						<img src="https://img.icons8.com/color/96/open-book--v1.png" alt="Materi Berkualitas" />
						<h4>Materi Berkualitas</h4>
						<p>Disusun oleh tim ahli dengan kurikulum terbaru dan fokus pada pemahaman konsep.</p>
					</div>
					<div class="reason-card">
						<img src="https://img.icons8.com/color/96/classroom--v2.png" alt="Instruktur Berpengalaman" />
						<h4>Instruktur Berpengalaman</h4>
						<p>Dibimbing oleh tutor profesional dari berbagai universitas ternama di Indonesia.</p>
					</div>
					<div class="reason-card">
						<img src="https://img.icons8.com/fluency/96/monitor.png" alt="Akses Fleksibel" />

						<h4>Akses Fleksibel</h4>
						<p>Belajar kapan saja, di mana saja. Tanpa batasan waktu dan perangkat.</p>
					</div>
					<div class="reason-card">
						<img src="https://img.icons8.com/color/96/idea-sharing.png" alt="Pembelajaran Adaptif" />
						<h4>Pembelajaran Adaptif</h4>
						<p>Menyesuaikan dengan gaya belajar siswa agar lebih efektif dan menyenangkan.</p>
					</div>
				</div>
			</div>
			<div class="why-image-modern">
				<img src="https://images.unsplash.com/photo-1588072432836-e10032774350?auto=format&fit=crop&w=600&q=80"
					alt="Belajar Online FIVY">
			</div>
		</div>
	</section>

	<section class="extra-cards">
		<div class="cards-container">
			<!-- Card Lulusan PTN -->
			<div class="card alumni-card">
				<div class="alumni-left">
					<h3>Lulusan PTN Terbaik</h3>
					<p class="alumni-desc">
						Alumni kami telah berhasil masuk ke PTN ternama berkat bimbingan yang tepat dan komitmen belajar
						yang
						tinggi.
					</p>
					<ul class="alumni-bullets">
						<li>✔ Berhasil tembus UI, ITB, dan UGM</li>
						<li>✔ Dibimbing mentor berpengalaman</li>
						<li>✔ Berprestasi & inspiratif</li>
					</ul>
				</div>
				<div class="alumni-right">
					<div class="alumni-item">
						<img src="https://images.unsplash.com/photo-1607746882042-944635dfe10e?auto=format&fit=crop&w=100&q=80"
							alt="Dian UI">
						<div class="alumni-info">
							<h4>Dian</h4>
							<span class="badge ui">Universitas Indonesia</span>
						</div>
					</div>
					<div class="alumni-item">
						<img src="https://images.unsplash.com/photo-1607746882042-944635dfe10e?auto=format&fit=crop&w=100&q=80"
							alt="Bima ITB">
						<div class="alumni-info">
							<h4>Bima</h4>
							<span class="badge itb">Institut Teknologi Bandung</span>
						</div>
					</div>
					<div class="alumni-item">
						<img src="https://images.unsplash.com/photo-1607746882042-944635dfe10e?auto=format&fit=crop&w=100&q=80"
							alt="Faiz UGM">
						<div class="alumni-info">
							<h4>Faiz</h4>
							<span class="badge ugm">Universitas Gadjah Mada</span>
						</div>
					</div>
				</div>
			</div>
			<!-- Card Grafik Siswa -->
			<div class="card chart-card">
				<h3>Presentase Siswa Lolos PTN</h3>
				<div class="chart">
					<div class="chart">
						<div class="bar-container">
							<div class="bar" data-value="63"></div>
							<div class="label">2021</div>
						</div>
						<div class="bar-container">
							<div class="bar" data-value="68"></div>
							<div class="label">2022</div>
						</div>
						<div class="bar-container">
							<div class="bar" data-value="79,2"></div>
							<div class="label">2023</div>
						</div>
						<div class="bar-container">
							<div class="bar" data-value="82,4"></div>
							<div class="label">2024</div>
						</div>
						<div class="bar-container">
							<div class="bar" data-value="85"></div>
							<div class="label">2025</div>
						</div>
					</div>

				</div>
			</div>
		</div>
	</section>

	<section class="pricing">
		<h2 class="pricing-title">Pilih Paket Bimbel Sesuai Kebutuhanmu</h2>
		<div class="pricing-container">
			<!-- Paket Dasar -->
			<div class="price-card">
				<h3>Paket Mingguan</h3>
				<p class="price">Rp 45.000/Minggu</p>
				<a href="<?= base_url('dashboard/pembayaran')?>" class="cta">Beli
					Sekarang</a>
			</div>

			<!-- Paket Pro -->
			<div class="price-card highlighted">
				<h3>Paket Bulanan</h3>
				<p class="price">Rp 99.000/Bulan</p>
				<a href="<?= base_url('dashboard/pembayaran')?>" class="cta">Paket
					Favorit</a>
			</div>

			<!-- Paket Premium -->
			<div class="price-card">
				<h3>Paket Tahunan</h3>
				<p class="price">Rp 149.000/Tahun</p>
				<a href="<?= base_url('pilih_paket')?>" class="cta">Beli
					Sekarang</a>
			</div>
		</div>
	</section>
	<section class="book-section" id="buku">
		<h2 class="section-title">Rekomendasi Buku Terbaik</h2>
		<div class="book-grid">

			<div class="book-card">
				<div class="book-image">
					<img src="https://img.icons8.com/clouds/200/literature.png" alt="Buku Fisika">
				</div>
				<div class="book-content">
					<h3>Bahasa Inggris</h3>
					<p>Panduan lengkap konsep dan soal HOTS Bahasa Inggris SMA.</p>
				</div>
			</div>

			<div class="book-card">
				<div class="book-image">
					<img src="https://img.icons8.com/clouds/200/calculator.png" alt="Buku Matematika">
				</div>
				<div class="book-content">
					<h3>Matematika Pintar</h3>
					<p>Rangkuman, trik cepat, dan latihan soal intensif.</p>
				</div>
			</div>

			<div class="book-card">
				<div class="book-image">
					<img src="https://img.icons8.com/clouds/200/language.png" alt="Buku Bahasa">
				</div>
				<div class="book-content">
					<h3>Bahasa Indonesia</h3>
					<p>Kuasai teks bacaan, struktur, dan soal literasi.</p>
				</div>
			</div>

			<div class="book-card">
				<div class="book-image">
					<img src="https://img.icons8.com/clouds/200/earth-planet.png" alt="Buku Kimia">
				</div>
				<div class="book-content">
					<h3>Geografi</h3>
					<p>Litosfer, Peta, dan soal-soal favorit.</p>
				</div>
			</div>

		</div>
		<div class="more">
			<button class="cta" onclick="window.location.href='<?= base_url('dashboard/bacaan') ?>'">Baca
				Selengkapnya</button>
		</div>
	</section>

	<section class="faq-section">
		<h2 class="section-title">Pertanyaan Umum</h2>
		<div class="faq-container">

			<div class="faq-item">
				<button class="faq-toggle">
					<span class="faq-question">Apa itu FIVY?</span>
					<svg class="faq-icon" viewBox="0 0 24 24">
						<path d="M6 9l6 6 6-6" stroke="#3b5a91" stroke-width="2" fill="none" stroke-linecap="round" />
					</svg>
				</button>
				<div class="faq-content">
					<p>FIVY adalah platform belajar online untuk siswa SMA/SMK dengan pendekatan interaktif, fleksibel,
						dan
						menyenangkan.</p>
				</div>
			</div>

			<div class="faq-item">
				<button class="faq-toggle">
					<span class="faq-question">Apa perbedaan antara Paket Dasar, Pro, dan Premium?</span>
					<svg class="faq-icon" viewBox="0 0 24 24">
						<path d="M6 9l6 6 6-6" stroke="#3b5a91" stroke-width="2" fill="none" stroke-linecap="round" />
					</svg>
				</button>
				<div class="faq-content">
					<p>Paket Dasar cocok untuk belajar mandiri, Pro menawarkan fitur latihan soal, dan Premium
						menyertakan mentor
						serta kelas live.</p>
				</div>
			</div>

			<div class="faq-item">
				<button class="faq-toggle">
					<span class="faq-question">Apakah ini bisa diakses oleh perangkat apa saja?</span>
					<svg class="faq-icon" viewBox="0 0 24 24">
						<path d="M6 9l6 6 6-6" stroke="#3b5a91" stroke-width="2" fill="none" stroke-linecap="round" />
					</svg>
				</button>
				<div class="faq-content">
					<p>Tentu. FIVY dapat diakses dari HP, tablet, maupun laptop tanpa perlu instalasi aplikasi tambahan.
					</p>
				</div>
			</div>

			<div class="faq-item">
				<button class="faq-toggle">
					<span class="faq-question">Apakah saya bisa berhenti langganan kapan saja?</span>
					<svg class="faq-icon" viewBox="0 0 24 24">
						<path d="M6 9l6 6 6-6" stroke="#3b5a91" stroke-width="2" fill="none" stroke-linecap="round" />
					</svg>
				</button>
				<div class="faq-content">
					<p>Bisa, kamu bisa menghentikan langganan kapan pun melalui menu akun. Tidak ada biaya tambahan.</p>
				</div>
			</div>

			<div class="faq-item">
				<button class="faq-toggle">
					<span class="faq-question">Bagaimana untuk cara pembayaran?</span>
					<svg class="faq-icon" viewBox="0 0 24 24">
						<path d="M6 9l6 6 6-6" stroke="#3b5a91" stroke-width="2" fill="none" stroke-linecap="round" />
					</svg>
				</button>
				<div class="faq-content">
					<p>Bisa lewat transfer bank, e-wallet (OVO, GoPay, Dana), atau kartu kredit.</p>
				</div>
			</div>

		</div>
	</section>
	<script>
		// Toggle FAQ
		document.addEventListener('DOMContentLoaded', function () {
			const faqToggles = document.querySelectorAll('.faq-toggle');

			faqToggles.forEach(button => {
				button.addEventListener('click', () => {
					const item = button.closest('.faq-item');

					document.querySelectorAll('.faq-item').forEach(faq => {
						if (faq !== item) faq.classList.remove('active');
					});

					item.classList.toggle('active');
				});
			});

			// Show more FAQ (if ada tombol dengan id "show-more")
			const showMoreBtn = document.getElementById('show-more');
			if (showMoreBtn) {
				showMoreBtn.addEventListener('click', () => {
					document.querySelectorAll('.faq-item.hidden').forEach(item => {
						item.classList.remove('hidden');
					});
					showMoreBtn.style.display = 'none';
				});
			}
		});
	</script>
	<script>
		document.addEventListener('DOMContentLoaded', function () {
			const bars = document.querySelectorAll('.bar');

			bars.forEach(bar => {
				const value = parseInt(bar.dataset.value);
				const percent = Math.min(value, 100) + '%';
				bar.style.height = percent;

				const percentLabel = document.createElement('div');
				percentLabel.textContent = percent;
				percentLabel.style.position = 'absolute';
				percentLabel.style.top = '-28px';
				percentLabel.style.background = '#fff';
				percentLabel.style.padding = '2px 6px';
				percentLabel.style.borderRadius = '6px';
				percentLabel.style.boxShadow = '0 1px 4px rgba(0,0,0,0.1)';
				percentLabel.style.fontSize = '14px';
				percentLabel.style.color = '#2c3e50';
				percentLabel.style.left = '50%';
				percentLabel.style.transform = 'translateX(-50%)';
				bar.appendChild(percentLabel);
			});
		});
	</script>
	<script>
		function toggleDropdown() {
			const dropdown = document.getElementById("profileDropdown");
			dropdown.classList.toggle("open");
		}

		window.addEventListener('click', function (e) {
			const dropdown = document.getElementById("profileDropdown");
			if (!dropdown.contains(e.target)) {
				dropdown.classList.remove("open");
			}
		});
	</script>


</body>
<footer>
	<div class="footer-container">
		<div class="footer-col">
			<h3>Tentang Kami</h3>
			<p>FIVY adalah solusi belajar online untuk siswa SMA/SMK dengan materi berkualitas dan tutor berpengalaman.
			</p>
		</div>
		<div class="footer-col">
			<h3>Quick Links</h3>
			<ul>
				<li><a href="<?= base_url('dashboard') ?>">Home</a></li>
				<li><a href="<?= base_url('member/buku') ?>">Daftar Bacaan</a></li>
				<li><a href="#" onclick="alert('Halaman Latihan Soal belum tersedia')">Latihan Soal</a></li>
				<li><a href="#" onclick="alert('Halaman Try Out belum tersedia')">Try Out</a></li>
			</ul>
		</div>
		<div class="footer-col contact-form">
			<h3>Kontak</h3>
			<input type="text" placeholder="Nama Anda">
			<input type="email" placeholder="Email Anda">
			<textarea rows="3" placeholder="Pesan Anda"></textarea>
			<button class="cta">Kirim</button>
		</div>
		<div class="footer-col">
			<h3>Ikuti Kami</h3>
			<div class="social-icons">
				<a href="#"><img src="https://img.icons8.com/color/48/facebook.png" alt="Facebook"></a>
				<a href="#"><img src="https://img.icons8.com/color/48/instagram-new.png" alt="Instagram"></a>
				<a href="#"><img src="https://img.icons8.com/color/48/youtube-play.png" alt="YouTube"></a>
			</div>
		</div>
	</div>
	<div class="footer-bottom">
		<p>&copy; 2025 FIVY. All Rights Reserved.</p>
	</div>
</footer>

</html>
