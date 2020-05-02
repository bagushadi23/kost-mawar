package com.example.myapplication;

import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;

import androidx.appcompat.app.AppCompatActivity;

public class MainActivity extends AppCompatActivity {

    private Button button1;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        button1 = (Button)findViewById(R.id.button1);
    }


    public boolean Cari(View view) {
        switch (view.getId()){
            case R.id.button1:
                Intent intent1 = new Intent(MainActivity.this,ListActivity.class);
                MainActivity.this.startActivity(intent1);
                break;
            default:
                return false;
        }
        return true;
    }

}
