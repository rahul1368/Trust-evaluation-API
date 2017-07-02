#include <iostream>
#include <fstream>
#include <string.h>
#include <ostream>
#include <stdio.h>
#include <string>
#include<set>
#include<map>

using namespace std;
 map<int,pair<int,int> > class_ranges;  map<int,pair<int,int> >::iterator it1;
int main(int argc,char* argv[])
{
			set<int> Unmatched_lines; set<int>::iterator it;  // Unmatched attributes

 int line1[]={2,3,5,6,7,9,11,13,14,16,18,20,21,22,24,26,28,30,32,33,35,37,39,41,43,44,46,48,50,52,54,55,57,59,61,63,65,66,68,70,72,74,76,77,78,80,82,84,85,87,89,91,93,95,97};
 unsigned int sz=sizeof(line1)/sizeof(line1[0]);
 int line2[]={4,4,19,12,8,10,12,19,15,17,19,75,31,23,25,27,29,31,42,34,36,38,40,42,53,45,47,49,51,53,64,56,58,60,62,64,75,67,69,71,73,75,98,83,79,81,83,94,86,88,90,92,94,96,98};
for(int i=0;i<sz;i++)
{int a,b; a=line1[i];b=line2[i];
pair<int,int> p=make_pair(a,b);
class_ranges[a]=p;
}
float weight[100]={0}; int tot_attributes=98;
//Open the two files//


string file1, file2;
    ifstream Mary1, Mary2,in;   //ofstream sdf("temp.txt");

    file1=argv[1];
    file2=argv[2] ;

	int p1=0,p2=0,p3=0,p4=0;
	in>>p1>>p2>>p3>>p4;


    Mary1.open( file1.c_str(), ios::binary ); //c_str() returns C-style string pointer
    Mary2.open( file2.c_str(), ios::binary );
// Check for failures //
    if (Mary1.fail())
    {cout << "Couldn't open the file  " << file1 <<endl;
    return 0;
    }

    if (Mary2.fail())
    {cout << "Couldn't open the file " << file2 << endl;
    return 0;
    }

// Read lines and increment line number counter //

    char string1[256], string2[400];
    int j = 0, error_count =0;
    while(!Mary1.eof())
    {
        Mary1.getline(string1,256);
        Mary2.getline(string2,256);
        j++;
        if(strcmp(string1,string2) != 0)
        {
            cout << j << "- the strings are not equal " << endl;  Unmatched_lines.insert(j);
            cout<< " file1:   " << string1 << endl;
            cout << " file2:  " << string2 << endl;
            error_count++;
        }
    }
    if (error_count > 0) {
    cout << "Files are different"<< endl;}
    else {cout << "Files are the same"<< endl;}




}
