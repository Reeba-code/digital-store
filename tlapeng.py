from flask import Flask, request, jsonify
from twilio.rest import Client

app = Flask(__name__)

# Twilio credentials
account_sid = 'your_account_sid'
auth_token = 'your_auth_token'
client = Client(SK8b92dc81eab5d3847a78805fc2bc527e, iam53ZxFMgWEE9VLbCCSYTyqOkqeJQfZ)

@app.route('/payment', methods=['POST'])
def payment():
    # Extract data from the request
    data = request.json
    phone_number = data.get('phone_number')

    # Send SMS
    message = client.messages.create(
        body='Thank you for your purchase! Your payment was successful.',
        from_='+27636601370',  # Your Twilio number
        to=phone_number
    )

    return jsonify({'status': 'success', 'message_sid': message.sid})

if __name__ == '__main__':
    app.run(debug=True)
