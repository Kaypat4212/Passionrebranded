const express = require("express");

const app = express();

app.use(express.static("public"));

app.get("/home", (req, res) => {
  res.sendFile("./index.html", { root: __dirname + "../FlexStartbad(kx)" });
});

app.listen(3000, () => {
  console.log("Server is listening on port 3000..");
});