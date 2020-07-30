package com.example.myapplication;

import androidx.appcompat.app.AppCompatActivity;
import androidx.appcompat.widget.Toolbar;

import android.content.Intent;
import android.os.Bundle;
import android.view.Menu;
import android.view.MenuInflater;
import android.view.View;
import android.widget.Button;
import android.widget.Toast;

public class Pesan1Activity extends AppCompatActivity {

    Button button;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_pesan1);

        Toolbar toolbar = findViewById(R.id.toolbar);
        setSupportActionBar(toolbar);

        button = (Button) findViewById(R.id.button);

    }

    @Override
    public boolean onCreateOptionsMenu(Menu menu) {
        setContentView(R.layout.activity_pesan1);
        MenuInflater menuInflater = getMenuInflater();
        menuInflater.inflate(R.menu.app_bar_menu, menu);
        return true;

    }

    public boolean P1(View view) {
        int id = view.getId();
        if (id == R.id.button) {
            Toast.makeText(getApplicationContext(), "Pesanan telah dikonfirmasi\nSilahkan tunggu untuk ditelepon ",
                    Toast.LENGTH_SHORT).show();
        } else {
            return false;
        }
        return true;
    }
}