const nodemailer = require('nodemailer');
require('dotenv').config(); // Use dotenv for environment variables

// Create a transporter object using SMTP settings
let transporter = nodemailer.createTransport({
  service: 'gmail', // or your email service provider
  auth: {
    user: process.env.EMAIL_USER,
    pass: process.env.EMAIL_PASS
  }
});

// Email options
let mailOptions = {
  from: process.env.EMAIL_USER,
  to: 'rebaoneesmy@gmail.com',
  subject: 'Payment Confirmation',
  text: 'Dear customer, your payment has been successful.'
};

// Send email
transporter.sendMail(mailOptions, (error, info) => {
  if (error) {
    console.log('Error: ', error);
  } else {
    console.log('Email sent: ', info.response);
  }
});
