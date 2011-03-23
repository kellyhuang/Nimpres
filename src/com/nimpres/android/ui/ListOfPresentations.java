package com.nimpres.android.ui;

import java.util.ArrayList;

import android.app.AlertDialog;
import android.app.ListActivity;
import android.content.DialogInterface;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.view.View.OnClickListener;
import android.widget.ArrayAdapter;
import android.widget.Button;
import android.widget.EditText;
import android.widget.ListView;
import android.widget.TextView;

import com.nimpres.R;
import com.nimpres.android.NimpresObjects;

public class ListOfPresentations extends ListActivity {
	private ArrayList<Object> item = new ArrayList<Object>();

	/** Called when the activity is first created. */
	@Override
	public void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		setContentView(R.layout.list_of_presentations);

		// setup Search button listener
		Button searchButton = (Button) findViewById(R.id.lopSearch);
		searchButton.setOnClickListener(new OnClickListener() {
			@Override
			public void onClick(View view) {
				EditText presenterID = (EditText) findViewById(R.id.lopPresenterID);
				String presenterIDString = presenterID.getText().toString();
				for (int i = 0; i < NimpresObjects.peerPresentations.size(); i++) {
					if (presenterIDString.equals(NimpresObjects.peerPresentations.get(i).getPresenterName())) {
						item.add(NimpresObjects.peerPresentations.get(i).getPresentationID());
						Log.d("ListOfPresentations","added item to list"+ NimpresObjects.peerPresentations.get(i).getPresentationName());
					}
				}
		    	ArrayAdapter<Object> presentationList =
		    		new ArrayAdapter<Object>(view.getContext(), R.layout.row, item);
		    	setListAdapter(presentationList);
		    	if (item.size() == 0) {
		    		TextView notice = (TextView) findViewById(R.id.lopEmpty);
		    		notice.setText("No Presentations are currently behing hosted by that presenter");
		    	}
		    	else {
		    		TextView notice = (TextView) findViewById(R.id.lopEmpty);
		    		notice.setText("");
		    	}
			}
		});
	}

	@Override
	protected void onListItemClick(ListView l, View v, int position, long id) {

		Object presentationID = item.get(position);

		new AlertDialog.Builder(this)
		.setIcon(R.drawable.icon)
		.setTitle("[" + presentationID + "]")
		.setPositiveButton("OK", 
				new DialogInterface.OnClickListener() {
					
					@Override
					public void onClick(DialogInterface dialog, int which) {
						// TODO Auto-generated method stub
						//TODO send info back to join presentation class
						
					}
				}).show();
	}
	
}