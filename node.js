// email.js
const nodemailer = require('nodemailer');

// Create a transporter object using SMTP transport
let transporter = nodemailer.createTransport({
    service: 'gmail', // or any other email service
    auth: {
        user: 'rebaoneesmy@gmail.com', // Your email address
        pass: 'Enoaber2797$'   // Your email password or app-specific password
    }
});

// Email options
let mailOptions = {
    from: 'mdineacad@outlook.com', // sender address
    to: 'rebaoneesmy@gmail.com',       // list of receivers
    subject: 'Payment Confirmation', // Subject line
    text: 'Dear customer, your payment has been successful.' // plain text body
};

// Send mail with defined transport object
transporter.sendMail(mailOptions, (error, info) => {
    if (error) {
        return console.log(error);
    }
    console.log('Message sent: %s', info.messageId);
});
