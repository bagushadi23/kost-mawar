package com.example.myapplication;

import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;

import androidx.appcompat.app.AppCompatActivity;

public class MainActivity extends AppCompatActivity {

    Button b1, b2;
    EditText ed1, ed2;
    int counter = 3;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        b1 = (Button) findViewById(R.id.button1);
        b2 = (Button) findViewById(R.id.btn_register);
        ed1 = (EditText) findViewById(R.id.txt_username);
        ed2 = (EditText) findViewById(R.id.txt_password);
        b1.setOnClickListener(new View.OnClickListener() {

            @Override

            public void onClick(View v) {
                //set username dan password dengan "admin"
                if (ed1.getText().toString().equals("admin") && ed2.getText().toString().equals("admin"))
                    //kondisi jika login benar
                    {
                    Intent intent1 = new Intent(MainActivity.this, ListActivity.class);
                    MainActivity.this.startActivity(intent1);
                }
                else {
                    //jika login gagal
                    Toast.makeText(getApplicationContext(), "Username atau Password Anda Salah",
                            Toast.LENGTH_SHORT).show();
                    counter--;
                    if (counter == 0) {
                        b1.setEnabled(false);
                    }
                }
            }
        });

        b2.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                finish();
            }
        });
    }
}

