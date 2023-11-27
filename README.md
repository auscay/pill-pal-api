User Role and Management can be found on Hydra api documentation https://github.com/auscay/hydra



## **Medication Schedule Documentation**

### **Create a Medication Schedule**

You can make an HTTP POST call to create a new schedule at the following endpoint:

**Endpoint:** `https://pillpal-api.pouletmedia.ng/api/schedule`

### **API Payload & Response**

You can send a Form Multipart payload or a JSON payload like this:

```json
 {
    "medication_name": "TEGRITOL",
    "dosage": "1",
    "unit": "ten",
    "medication_cycle": "every day",
    "start_date": "2023-11-26",
    "end_date": "2023-12-01",
    "description": "a schedule",
    "medication_time": "07:15:04",
    "notification_preferences": "sms"
}
```


You will receive a 201 response like this

```json
{
    "error": 0,
    "message": "Schedule created sucessfully",
    "schedule": {
        "medication_name": "TEGRITOL",
        "dosage": "1",
        "unit": "ten",
        "medication_cycle": "every day",
        "start_date": "2023-11-26",
        "end_date": "2023-12-01",
        "description": "a schedule",
        "medication_time": "07:15:04",
        "notification_preferences": "sms",
        "updated_at": "2023-11-25T19:57:15.000000Z",
        "created_at": "2023-11-25T19:57:15.000000Z",
        "id": 1
    }
}
```

**Show one medication schedule**

You can make an HTTP GET call to show a single schedule to the following endpoint.
https://pillpal-api.pouletmedia.ng/api/schedule/{id}

The {id} should be replaced by the specific id of the schedule

For example GET https://pillpal-api.pouletmedia.ng/api/schedule/1

You will receive a 201 response like this

```json
{
	"id": 1
        "medication_name": "TEGRITOL",
        "dosage": "1",
        "unit": "ten",
        "medication_cycle": "every day",
        "start_date": "2023-11-26",
        "end_date": "2023-12-01",
        "description": "a schedule",
        "medication_time": "07:15:04",
        "notification_preferences": "sms",
        "updated_at": "2023-11-25T19:57:15.000000Z",
        "created_at": "2023-11-25T19:57:15.000000Z",
}
```

If the id is not found you will get a response like this

```json
{
    "error": 1,
    "message": "No query results found"
}
```

**Update a medication schedule**

You can make an HTTP PUT call to create a new schedule to the following endpoint.
https://pillpal-api.pouletmedia.ng/api/schedule/{id}

For example PUT https://pillpal-api.pouletmedia.ng/api/schedule/1

API Payload & Response

You can send a Form Multipart payload or a JSON payload like this.

```json

{
    "medication_name": "Ciprotab",
    "dosage": "5",
    "unit": "one",
    "medication_cycle": "every week",
    "start_date": "2023-11-26",
    "end_date": "2023-12-01",
    "description": "a ciprotab schedule",
    "medication_time": "07:15:04",
    "notification_preferences": "text"
}

```
You will receive a 201 response like this

```json

{
    "error": 0,
    "message": "Schedule updated sucessfully",
    "schedule": {
        "medication_name": "Ciprotab",
        "dosage": "5",
        "unit": "one",
        "medication_cycle": "every week",
        "start_date": "2023-11-26",
        "end_date": "2023-12-01",
        "description": "a ciprotab schedule",
        "medication_time": "07:15:04",
        "notification_preferences": "text"
        "updated_at": "2023-11-25T19:57:15.000000Z",
        "created_at": "2023-11-25T19:57:15.000000Z",
        
    }
}
```

**Delete one medication schedule**

You can make an HTTP DELETE call to delete a single schedule to the following endpoint.
https://pillpal-api.pouletmedia.ng/api/schedule/{id}

The {id} should be replaced by the specific id of the schedule

For example DELETE https://pillpal-api.pouletmedia.ng/api/schedule/1

You will receive a 201 response like this

```json
{
    "error": 0,
    "message": "Schedule deleted successfully"
}
```

**Authorization & Relationships**

User/Admin Authorization

Only authenticated users can create schedules

Authenticated users can view only their personal created schedules using the following endpoint. Also add the Bearer Authorization token assigned to the user after login.

For example GET https://pillpal-api.pouletmedia.ng/api/mySchedule

You will receive a 201 response like this:

```json
{
   "id": 11,
   "user_id": 2,`
   "medication_name": "Chroloroquine",
   "dosage": 500,`
   "unit": mg,`
   "medication_cycle": "weekly",
   "start_date": "2023-11-26",     
    "end_date": "2023-11-26",
   "description": "My headache drug",
   "medication_time": "08:00:00",
   "notification_preferences": 1,
   "created_at": "2023-11-26T15:45:46.000000Z",
    "updated_at": "2023-11-26T15:45:46.000000Z"
}
```

The user_id represents the user that created the schedule.


**Admin Authentication**

Pill-pal-api comes with the default admin user? You can log in as an admin by making an HTTP POST call to the following route.

https://pillpal-api.pouletmedia.ng/api/login

API Payload & Response

```json
{ 
   "email":"admin@pill-pal.poulet.ng",
   "password":"hydra" 
}
```


You will get a JSON response with a user token. You need this admin token for making any call to other routes protected by admin ability.

```json
{
"error": 0, 
"token": "1|se9wkPKTxevv9jpVgXN8wS5tYKx53wuRLqvRuqCR"
}
```

For any unsuccessful attempt, you will receive a 401 error response.

```json
{
 "error": 1,
 "message": "invalid credentials"
}
```

**Get all patients schedules**

This requires admin ability

Make a HTTP GET request to the following endpoint https://pillpal-api.pouletmedia.ng/api/schedule




