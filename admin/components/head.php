<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin | Prime Property Realtors</title>
  <link
    href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css"
    rel="stylesheet" />
  <!-- <link rel="stylesheet" href="../css/dashboard.css"> -->
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap');

    :root {
      --main-color: #0069ff;
      --black: #303030;
      --box-shodow: 0 0.5rem 1rem rgba(0, 0, 0, 0.1);
      --red-clr: #ff1212;
    }

    * {
      font-family: "Inter", sans-serif;
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      outline: none;
      border: none;
      text-decoration: none;
    }

    body {
      color: var(--black);
    }

    ul {
      list-style: none;
    }

    a {
      text-decoration: none;
      color: var(--black);
    }

    button {
      cursor: pointer;
    }

    img {
      max-width: 100%;
    }

    .flx {
      display: flex;
    }

    .flx-ctr {
      align-items: center;
    }

    .mg-x {
      margin: 0 8px !important;
    }

    .mg-y-16 {
      margin: 16px 0 !important;
    }

    .flx-between {
      justify-content: space-between;
    }

    .dashboard-wrap {
      display: flex;
      height: 100%;
    }

    .sidebar {
      width: 20%;
      background-color: #eee;
      min-height: 100vh;
      height: 100%;
      padding: 20px;
      position: fixed;
      bottom: 0px;
    }

    .dash-header {
      background-color: #eee;
      padding: 8px 20px;
      border-bottom: 1px solid #eee;
    }

    .main {
      width: 100%;
      margin-left: 20%;
    }

    .dashboard-container {
      padding: 20px 10px;
    }

    .dash-header {
      /* padding: 20px 10px; */
      display: flex;
      align-items: center;
      justify-content: space-between;
    }

    .overview {
      margin-top: 10px;
    }

    .title-h2 {
      font-size: 20px;
      font-weight: 700;
      line-height: 1.5;
      margin-bottom: 10px;
    }

    .title-h3 {
      font-size: 16px;
      font-weight: 600;
    }

    .title-h4 {
      font-size: 18px;
      font-weight: 600;
    }

    .txt-tiny {
      font-size: 13px;
    }


    .dash-card-wrap {
      display: flex;
      gap: 20px;
    }

    .dash-card {
      border-radius: 8px;
      border: 1px solid #ccc;
      padding: 10px 10px;
      width: 20%;
    }

    .dash-card p {
      margin-bottom: 20px;
    }

    .sidebar-links li a {
      padding: 12px 0;
      transition: 0.35s ease;
      display: flex;
      align-items: center;
      margin: 10px 0;
      font-weight: 500;
      font-size: 15.8px;
    }

    .sidebar-links li a i {
      font-size: 22px;
      padding-right: 4px;
    }

    .sidebar-links li a:hover {
      color: var(--main-color);
    }

    .theme-btn {
      color: #fff;
      background-color: var(--main-color);
      border-radius: 6px;
      padding: 10px 20px;
      font-size: 15px;
      transition: 0.35s ease;
      display: inline-block;
    }

    .theme-btn-alt {
      background-color: #eee;
      color: var(--black)
    }

    .theme-btn-alt:hover {
      background-color: #dddada !important;
    }

    .theme-btn-submit {
      min-width: 200px;
    }

    .theme-btn:hover {
      background-color: #378aff;
    }

    .app-form {
      max-width: 100%;
    }

    .app-form-label {
      font-size: 14px;
      margin-bottom: 6px;
      display: block;
    }

    .app-input {
      padding: 10px;
      width: 100%;
      border: 1px solid #eee;
      border-radius: 4px;
      transition: 0.3s ease;
    }

    .app-form-group {
      margin: 16px 0;
    }

    .app-content {
      background-color: #fbfbfb;
      padding: 12px 24px;
      margin: 16px 0;
      border-radius: 8px;
    }

    .app-input:focus {
      border-color: var(--main-color);
    }

    @media screen and (min-width:900px) {
      .app-form {
        max-width: 60%;
      }
    }

    .alert .inner {
      display: block;
      padding: 6px;
      margin: 6px;
      border-radius: 3px;
      border: 1px solid rgb(180, 180, 180);
      background-color: rgb(212, 212, 212);
    }

    .alert .close {
      float: right;
      margin: 3px 12px 0px 0px;
      cursor: pointer;
    }

    .alert .inner,
    .alert .close {
      color: rgb(88, 88, 88);
    }

    .alert input {
      display: none;
    }

    .alert input:checked~* {
      animation-name: dismiss, hide;
      animation-duration: 300ms;
      animation-iteration-count: 1;
      animation-timing-function: ease;
      animation-fill-mode: forwards;
      animation-delay: 0s, 100ms;
    }

    .alert.error .inner {
      border: 1px solid rgb(238, 211, 215);
      background-color: rgb(242, 222, 222);
    }

    .alert.error .inner,
    .alert.error .close {
      color: rgb(185, 74, 72);
    }

    .alert.success .inner {
      border: 1px solid rgb(214, 233, 198);
      background-color: rgb(223, 240, 216);
    }

    .alert.success .inner,
    .alert.success .close {
      color: rgb(70, 136, 71);
    }

    .alert.info .inner {
      border: 1px solid rgb(188, 232, 241);
      background-color: rgb(217, 237, 247);
    }

    .alert.info .inner,
    .alert.info .close {
      color: rgb(58, 135, 173);
    }

    .alert.warning .inner {
      border: 1px solid rgb(251, 238, 213);
      background-color: rgb(252, 248, 227);
    }

    .alert.warning .inner,
    .alert.warning .close {
      color: rgb(192, 152, 83);
    }

    .d-none {
      display: none;
    }

    .p-detail .title {
      font-weight: 600;
      font-size: 15.8px;

    }

    .p-detail .addr,
    .dt {
      font-size: 13px;
      color: #666;
      padding: 8px 0;
    }

    .p-contact p {
      margin: 8px 0;
    }

    .table-action a {
      display: inline-block;
      padding: 8px;
      width: 32px;
      height: 32px;
      background-color: #eee;
      border-radius: 50%;
      text-align: center;
      display: inline-flex;
      align-items: center;
      justify-content: center;
      transition: 0.35s ease
    }

    .table-action a:hover {
      background-color: var(--main-color);
      color: #fff;
    }

    .app-table {
      width: 100%;
      border-collapse: collapse;
      font-size: 15px;
      /* border: 1px solid blue; */
    }

    .app-table thead tr th {
      border: 1px solid transparent;
      background-color: #e7eff9;
    }

    .app-table th,
    .app-table td {
      text-align: left;
      padding: 8px;
    }

    @keyframes dismiss {
      0% {
        opacity: 1;
      }

      90%,
      100% {
        opacity: 0;
        font-size: 0.1px;
        transform: scale(0);
      }
    }

    @keyframes hide {
      100% {
        height: 0px;
        width: 0px;
        overflow: hidden;
        margin: 0px;
        padding: 0px;
        border: 0px;
      }
    }
  </style>
</head>