const express = require('express');
const app = express();
const bodyParser = require('body-parser');
const port = process.env.PORT || 3000;

app.use(bodyParser.urlencoded({ extended: false }));
app.use(express.static('public')); // Create a 'public' directory for your HTML files

app.post('/submit-form', (req, res) => {
  // Handle form submission here
  // You can access form data using req.body
  console.log('Form data:', req.body);
  
  // You can implement your data processing logic here
  
  res.send('Form submission successful'); // Send a response back to the client
});

app.listen(port, () => {
  console.log(`Server is running on port ${port}`);
});
