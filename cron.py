#Requiring the libraries for usage in the code execution flow
import numpy
import struct
import time
import datetime
import urllib
import base64
import hashlib
import hmac
import mysql.connector
import requests
import json
import uuid

#Defining the function to make the encoded query string
def encodeToQueryString(params):
        return urllib.urlencode(params)




def buildBrowserTag(params, secret, baseUrl = 'https://www.facebook.com/tr'):
        eid = uuid.uuid1()
        params['eid'] = str(eid.int)
        params['ts']  = str(int(time.time())*1000)
        queryStr = encodeToQueryString(params)
        shaSignature = hmac.new(secret, queryStr, digestmod=hashlib.sha256).digest()
        signature = urllib.quote_plus(base64.b64encode(shaSignature))
        uri = baseUrl+'?'+(queryStr+'&sig='+signature)
        return uri

def generateSignedFBEventURI(eventName, eventData):
        pixelId = '1566469273453318';
        pixelSecretKey = 'A1d3U7rW+RoiFUbZPtLLVsS0jteaHndbqd0irbRCxjc=';
        payload = {
                'id': pixelId,
                'eventName' : eventName,
                'eventData' : eventData,
                'noScript'  : '1'
        };
        return buildBrowserTag(payload, pixelSecretKey)


def fetchAllCancelled():
        mydb = mysql.connector.connect(
          host="newslaundry.com",
          user="root",
          passwd="OmtZUVzo",
          database="accessman_laundry"
        )
        myCursor = mydb.cursor()
        now = datetime.datetime.now()
        today12am = now.replace(hour=0, minute=0, second =0,)
        todayEndTime = now.replace(hour=23, minute=59, second=59)
        query = "SELECT * FROM nl_user_subscriptions where end_date between '{0}' and '{1}'".format(today12am.strftime('%Y-%m-%d %H:%M:%S'), todayEndTime.strftime('%Y-%m-%d %H:%M:%S'))
        print query
        myCursor.execute(query)
        myResult = myCursor.fetchall()
        return myResult



def processAllCancelled():
        allCancelledSubscription = fetchAllCancelled()
        print len(allCancelledSubscription)
        for x in allCancelledSubscription:
                eventName = 'Cancel'
                eventData = {
                        'subscription_id' : str(x[2]),
                        'reason' : ''
                }
                fbSignedEventTag = generateSignedFBEventURI(eventName, eventData)
                r = requests.get(fbSignedEventTag)
                if r.status_code == 200:
                        print 'Success for '+str(x[2])
                else:
                        print 'Not Success for'+str(x[2])

if __name__ == '__main__':
  processAllCancelled()

