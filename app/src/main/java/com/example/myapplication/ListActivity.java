package com.example.myapplication;

import androidx.appcompat.app.AppCompatActivity;
import androidx.appcompat.widget.Toolbar;

import android.content.Intent;
import android.os.Bundle;
import android.view.Menu;
import android.view.MenuInflater;
import android.view.View;
import android.widget.Button;

import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;

import org.json.JSONArray;
import org.json.JSONObject;

public class ListActivity extends AppCompatActivity {

    private Button button;
    private Button button2;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_list);

        Toolbar toolbar = findViewById(R.id.toolbar);
        setSupportActionBar(toolbar);

        button = (Button)findViewById(R.id.button);
        button2 = (Button)findViewById(R.id.button2);
    }
    @Override
    public boolean onCreateOptionsMenu(Menu menu) {
        setContentView(R.layout.activity_list);
        MenuInflater menuInflater = getMenuInflater();
        menuInflater.inflate(R.menu.app_bar_menu,menu);
        return true;

    }

    public boolean Pesan(View view) {
        int id = view.getId();
        if (id == R.id.button) {
            Intent intent1 = new Intent(ListActivity.this,Pesan1Activity.class);
            ListActivity.this.startActivity(intent1);
        } else if (id == R.id.button2) {
            Intent intent2 = new Intent(ListActivity.this,Pesan2Activity.class);
            ListActivity.this.startActivity(intent2);
        } else {
            return false;
        }
        return true;
    }


}
