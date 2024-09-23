<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  <link rel="stylesheet" href="/css/dashboardStyle.css">
</head>
<body>
<div class="dashboard-container">
  <h1>Dashboard</h1>

  <div class="search-container">
    <input type="text" id="search" placeholder="Search for student information...">
    <button id="searchButton">Search</button>
  </div>

  <div class="table-container">
    <table id="studentTable">
      <thead>
      <tr>
        <th>ID</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Address</th>
        <th>City</th>
        <th>State</th>
        <th>Zip</th>
        <th>Phone</th>
      </tr>
      </thead>
      <tbody>
      </tbody>
    </table>
  </div>

  <div class="modify-container">
    <input type="text" id="field1" placeholder="First Name">
    <input type="text" id="field2" placeholder="Last Name">
    <input type="text" id="field3" placeholder="Address">
    <input type="text" id="field4" placeholder="City">
    <input type="text" id="field5" placeholder="State">
    <input type="text" id="field6" placeholder="Zip">
    <input type="text" id="field7" placeholder="Phone">
    <button id="modifyButton">Modify</button>
  </div>
</div>
<script src="../js/dashboard.js"></script> <!-- This needs to be changed based on directory -->
</body>
