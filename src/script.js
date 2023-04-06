

$(document).ready(function() {
  $("#submitButton").click(function() {
  let employeeId = $("#employeeId").val();
  let xhr = new XMLHttpRequest();
  xhr.open("GET", "getSchedule.php?employeeId=" + employeeId, true);
  xhr.setRequestHeader("Content-Type", "application/json");
  xhr.onreadystatechange = function() {
  if (xhr.readyState === 4 && xhr.status === 200) {
  let data = JSON.parse(xhr.responseText);
  console.log(data);
  let output = "";
  for (let i in data) {
  output += "<tr><td>" + i + "</td><td>" + data[i] + "</td></tr>";
  }
  $("#planningTable").append(output);
  } else if (xhr.readyState === 4 && xhr.status !== 200) {
  console.error("Erreur lors de la requête : " + xhr.status + " " + xhr.statusText);
  $("#planningTable").append("<tr><td colspan='2'>ID de l'employé incorrect</td></tr>");
  }
  };
  xhr.send();
  });
  });