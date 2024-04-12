const express = require('express');
const cors = require('cors');
const bodyParser = require('body-parser');

const app = express();

// Middleware to parse JSON bodies
app.use(bodyParser.json());

app.use(cors({credentials: true,}));

// Define a POST endpoint
app.post('/SendToMySql', (req, res) => {
  // Access the data sent by the client
  const data = req.body;

  // Process the data as needed
  console.log(data);

  // Send a response back to the client
  res.json({ message: 'Data received successfully' });
});

// Start the server
const PORT = process.env.PORT || 3000;
app.listen(PORT, () => {
  console.log(`Server is running on port ${PORT}`);
});
