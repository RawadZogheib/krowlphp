package com.example.randomchatonline;

import android.app.ProgressDialog;
import android.content.Intent;
import android.net.Uri;
import android.os.AsyncTask;
import android.os.Bundle;
import android.view.View;
import android.widget.AdapterView;
import android.widget.ArrayAdapter;
import android.widget.Button;
import android.widget.RadioButton;
import android.widget.Spinner;
import android.widget.TextView;
import android.widget.Toast;

import androidx.appcompat.app.AppCompatActivity;

import java.io.BufferedReader;
import java.io.BufferedWriter;
import java.io.IOException;
import java.io.InputStream;
import java.io.InputStreamReader;
import java.io.OutputStream;
import java.io.OutputStreamWriter;
import java.net.HttpURLConnection;
import java.net.URL;


public class register extends AppCompatActivity implements AdapterView.OnItemSelectedListener{

    public static final int CONNECTION_TIMEOUT = 10000;
    public static final int READ_TIMEOUT = 15000;
    String gender;
    TextView userName, email, password, rePassword, login, phoneNumber;
    RadioButton male, female;
    Button register;
    Spinner spinner;
    String preff = null;
    String fullMail;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_register);


        userName = (TextView) findViewById(R.id.userName);
        email = (TextView) findViewById(R.id.email);
        spinner = (Spinner) findViewById(R.id.spinner);
        phoneNumber = (TextView) findViewById(R.id.phoneNumber);
        password = (TextView) findViewById(R.id.password);
        rePassword = (TextView) findViewById(R.id.rePassword);
        login = (TextView) findViewById(R.id.login);
        register = (Button) findViewById(R.id.register);

        male = (RadioButton) findViewById(R.id.male);
        female = (RadioButton) findViewById(R.id.female);


        ArrayAdapter adapter = ArrayAdapter.createFromResource(
                this,
                R.array.spinner_item,
                R.layout.color_spinner
        );
        adapter.setDropDownViewResource(R.layout.spinner_dropdown_layout);
        spinner.setAdapter(adapter);
        spinner.setOnItemSelectedListener(this);

        login.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                System.exit(0);
            }
        });


    }

    @Override
    public void onItemSelected(AdapterView<?> parent, View view, int position, long id) {
        preff = parent.getSelectedItem().toString();
    }

    @Override
    public void onNothingSelected(AdapterView<?> parent) {
        preff = null;
    }

 
    public void registerFunction(View arg0) {

        if (userName.getText().length() == 0 || email.getText().length() == 0 || password.getText().length() == 0 ||
                rePassword.getText().length() == 0 || preff.equals("your mail type") || preff.equals(null) || (!male.isChecked() && !female.isChecked())) {
            Toast.makeText(getApplicationContext(), "Please make sure all fields have been entered", Toast.LENGTH_SHORT).show();

        } else if(userName.getText().length()>8){
            Toast.makeText(getApplicationContext(), "Your userName can only contain 8 characters", Toast.LENGTH_SHORT).show();

        } else if ((fullMail = email.getText().toString() + preff).length() > 23) {
            Toast.makeText(getApplicationContext(), "Your email can only contain 23 characters", Toast.LENGTH_SHORT).show();

        } else if (userName.getText().toString().contains(" ") || email.getText().toString().contains(" ") || phoneNumber.getText().toString().contains(" ") || password.getText().toString().contains(" ")) {
            Toast.makeText(getApplicationContext(), "No Spaces Allowed", Toast.LENGTH_SHORT).show();

        } else if (email.getText().toString().contains(" ")) {
            Toast.makeText(getApplicationContext(), "Email can't contain spaces", Toast.LENGTH_SHORT).show();

        } else if (phoneNumber.getText().toString().length() > 12) {
            Toast.makeText(getApplicationContext(), "Your phone number can only contain 12 characters", Toast.LENGTH_SHORT).show();

        }else if (password.getText().length() < 8) {
            Toast.makeText(getApplicationContext(), "Your password must contain at least 8 characters", Toast.LENGTH_SHORT).show();
        } else {
            String pass1 = password.getText().toString();
            String pass2 = rePassword.getText().toString();

            if (!pass1.equals(pass2)) {
                Toast.makeText(getApplicationContext(), "Please make sure your passwords match", Toast.LENGTH_SHORT).show();
            } else {

                if(male.isChecked())
                    gender=("male");
                else gender=("female");


                // Get text from userName and passord field
                final String UserName = userName.getText().toString();
                final String Mail = fullMail;
                final String PhoneNumber = phoneNumber.getText().toString();
                final String Password = password.getText().toString();
                final String RePassword = rePassword.getText().toString();
                final String Gender = gender;

                new AsyncLogin().execute(UserName, Mail, PhoneNumber, Password, RePassword, Gender);
                // Initialize  AsyncLogin() class with email and password
            }
        }


    }



    private class AsyncLogin extends AsyncTask<String, String, String> {
        ProgressDialog pdLoading = new ProgressDialog(register.this);
        HttpURLConnection conn;
        URL url = null;

        @Override
        protected void onPreExecute() {
            super.onPreExecute();

            //this method will be running on UI thread
            pdLoading.setCancelable(false);
            pdLoading.show();
            pdLoading.setContentView(R.layout.progress_dialog);
            pdLoading.getWindow().setBackgroundDrawableResource(
                    android.R.color.transparent
            );

        }

        @Override
        protected String doInBackground(String... params) {
            try {

                // Enter URL address where your php file resides
                url = new URL("http://185.217.184.239/PHP/(Control)regist.php");


                // Setup HttpURLConnection class to send and receive data from php and mysql
                conn = (HttpURLConnection) url.openConnection();
                conn.setReadTimeout(READ_TIMEOUT);
                conn.setConnectTimeout(CONNECTION_TIMEOUT);
                conn.setRequestMethod("POST");

                // setDoInput and setDoOutput method depict handling of both send and receive
                conn.setDoInput(true);
                conn.setDoOutput(true);


                // Append parameters to URL
                Uri.Builder builder = new Uri.Builder()
                        .appendQueryParameter("userName", params[0])
                        .appendQueryParameter("mail", params[1])
                        .appendQueryParameter("phoneNumber", params[2])
                        .appendQueryParameter("password", params[3])
                        .appendQueryParameter("rePassword", params[4])
                        .appendQueryParameter("gender", params[5]);
                String query = builder.build().getEncodedQuery();


                // Open connection for sending data
                OutputStream os = conn.getOutputStream();
                BufferedWriter writer = new BufferedWriter(
                        new OutputStreamWriter(os, "UTF-8"));
                writer.write(query);
                writer.flush();
                writer.close();
                os.close();
                conn.connect();


                int response_code = conn.getResponseCode();

                // Check if successful connection made
                if (response_code == HttpURLConnection.HTTP_OK) {

                    // Read data sent from server
                    InputStream input = conn.getInputStream();
                    BufferedReader reader = new BufferedReader(new InputStreamReader(input));
                    StringBuilder result = new StringBuilder();
                    String line;

                    while ((line = reader.readLine()) != null) {
                        result.append(line);
                    }

                    // Pass data to onPostExecute method
                    return (result.toString());

                } else {

                    return ("unsuccessful");
                }

            } catch (IOException e) {
                e.printStackTrace();
                return "exception";
            } finally {
                conn.disconnect();
            }


        }

        @Override
        protected void onPostExecute(String result) {

            //this method will be running on UI thread

            pdLoading.dismiss();

            if (result.equalsIgnoreCase("Done")) {
                /* Here launching another activity when login successful. If you persist login state
                use sharedPreferences of Android. and logout button to clear sharedPreferences.
                 */
                String p;
                String un;

                Intent resultat = new Intent();
                un = userName.getText().toString();
                p = password.getText().toString();
                resultat.putExtra("UN", un);
                resultat.putExtra("P", p);
                setResult(RESULT_OK, resultat);
                finish();

                // Done
                //1 Please make sure your password does not contain spaces
                //2	Your password must contain at least 8 characters
                //3 Please make sure your passwords match
                //4	Error with registration
                //5 email already exist
                //6 userName already exist
                //7 Connection error

            }else if (result.equalsIgnoreCase("1")) {

                        Toast.makeText(register.this, "No Spaces Allowed", Toast.LENGTH_SHORT).show();

                    } else if (result.equalsIgnoreCase("2_1")) {

                        Toast.makeText(register.this, "Your userName can only contain 8 characters", Toast.LENGTH_SHORT).show();
                    } else if (result.equalsIgnoreCase("2_2")) {

                        Toast.makeText(register.this, "Your Email can only contain 12 characters", Toast.LENGTH_SHORT).show();
                    } else if (result.equalsIgnoreCase("2_3")) {

                        Toast.makeText(register.this, "Your phone number can only contain 23 characterss", Toast.LENGTH_SHORT).show();

                    } else if (result.equalsIgnoreCase("2_4")) {

                        Toast.makeText(register.this, "Your password must contain at least 8 characters", Toast.LENGTH_SHORT).show();
                    } else if (result.equalsIgnoreCase("3")) {

                        Toast.makeText(register.this, "Please make sure your passwords match", Toast.LENGTH_SHORT).show();

                    } else if (result.equalsIgnoreCase("4")) {

                        Toast.makeText(register.this, "Error with registration", Toast.LENGTH_SHORT).show();

                    } else if (result.equalsIgnoreCase("55")) {
                        Toast.makeText(register.this, "Phone Number already exist", Toast.LENGTH_SHORT).show();

                    } else if (result.equalsIgnoreCase("5")) {

                        Toast.makeText(register.this, "Email already exist", Toast.LENGTH_SHORT).show();

                    } else if (result.equalsIgnoreCase("6")) {

                                Toast.makeText(register.this, "UserName already exist", Toast.LENGTH_SHORT).show();

                    } else if (result.equalsIgnoreCase("7")) {

                        Toast.makeText(register.this, "Connection error", Toast.LENGTH_SHORT).show();

                    } else if (result.equalsIgnoreCase("unsuccessful")) {

                        Toast.makeText(register.this, "unsuccessful", Toast.LENGTH_SHORT).show();

                    } else if (result.equalsIgnoreCase("exception")) {
                        Toast.makeText(register.this, "Failed to connect... Try again in few seconds", Toast.LENGTH_SHORT).show();

                    } else
                        Toast.makeText(register.this, "OOPs! Something went wrong. Connection Problem.", Toast.LENGTH_SHORT).show();



        }


    }

}







