#include<bits/stdc++.h>
#include <stdio.h>
#include <math.h>
 using namespace std;
int main(int argc,char* argv[]) {    //cout<<"Hloo I am anp"<<endl;
    int n ,r, c   ;
	   string pointer;
	   pointer=argv[1];
	   n=atoi(pointer.c_str());//cout<<"n= "<<n<<endl;
    float inputMatrix[100][100], rowSum[100],innputMatrix[100][100];

    float a  = 0, square[100] = {0.0},ssquare[100] = {0.0},sqquare[100]= {0.0};


    double norm[100][100], k=0 ,l[100],nnorm[100][100] ;

   // printf("put the value of n\n");
    //scanf(" %d",  &n);
    //printf("Enter matrix of size %dX%d\n", n, n);


    for ( r = 1; r <= n; r++) {
        for (c = 1; c <= n; c++)
     {


   if(  r==c ) {

        inputMatrix[r][c] =1 ;
      }


      else if(  r<=c ){

      inputMatrix[r][c] =c +r;
   }
   else if(  c<=r ){

      inputMatrix[r][c] =100/(c+r)*.01;
   }
   }

    }




   /* for( r = 1; r <= n; r++) {
        for( c = 1; c <= n; c++) {
            //printf("%f ", inputMatrix[r][c]);
            // ...  ^^ you should print integer numbers
        }

        //printf("\n");
    }  */

    for(c = 1; c <= n; c++)
       {
           for(r = 1; r <= n; r++)
           {
        //      ^^^ I don't know why you skip this here

            //^ You have to assign, not to compare!
            square[c] += inputMatrix[r][c] ;
            //           ^^^^^ no need to call pow()
        }
        //printf("Sum of  cols %d: %f\n",c,square[c]);
        //             square contains int ^^
        // It would be nice and safer if you check here if square == 0 to avoid a
        // division by zero and probably detect bad input data
    }

    for ( c = 1; c <= n; c++ ) {
        // It's far more efficient to precalculate this term, even if compilers
        // could be smart enough to do it for you. You may want to store those
        // values in an array of doubles instead of the (sum of) squares
        k = 1.0 / (square[c]);
        for( r = 1; r <= n; r++ ) {
            norm[r][c] = k * inputMatrix[r][c] ;
            // again,  ^ assign not compare
        }
    }

    // you can add the printf to the previous loop...
    /*printf("\nNormalized Matrix:\n");
    for( r = 1; r <= n; r++) {
        for( c = 1; c <= n; c++) {
            printf("%.3lf ", norm[r][c]);
            //      ^^^^^ norm contains double
        }
        printf("\n");
    }   */


for ( r=1; r<=n; r++ )
{
   l[r]=0;
 for ( c=1; c<=n; c++ )
 l[r] = l[r] + norm[r][c];
}
//printf("\n Matrix:\n");
    {
        for( r = 1; r <= n; r++) {
           // printf("%.3lf ", l[r]);
            //      ^^^^^ norm contains double
        }
        //printf("\n");
    }

for (c = 1; c <= 1; c++)  {
        for (r = 1; r <= n; r++) {
        //      ^^^ I don't know why you skip this here

            //^ You have to assign, not to compare!
            ssquare[c] += l[r] ;
            //           ^^^^^ no need to call pow()
        }
        //printf("Sum of  cols %d: %f\n",r,ssquare[c]);
        //             square contains int ^^
        // It would be nice and safer if you check here if square == 0 to avoid a
        // division by zero and probably detect bad input data
    }

    for ( c = 1; c <= 1; c++ ) {
        // It's far more efficient to precalculate this term, even if compilers
        // could be smart enough to do it for you. You may want to store those
        // values in an array of doubles instead of the (sum of) squares
        k = 1.0 / (ssquare[c]);
        for( r = 1; r <= n; r++ ) {
            nnorm[r][c] = k * l[r] ;
            // again,  ^ assign not compare
        }
    }

    // you can add the printf to the previous loop...
   // printf("\nNormalized Matrix:\n");
    for( c = 1; c <= 1; c++) {
        for( r = 1; r <= n; r++) {
            printf("%.3lf ", nnorm[r][c]);
            //      ^^^^^ norm contains double
        }
        printf("\n");
    }
for(r=1; r<=n; r++)
    {
        for(c=1; c<=n; c++)
        {

            nnorm[r][c] = 100 * nnorm[r][c];
        }
    }
    /*printf("\npercentage criteria = \n");
    for(c=1; c<=1; c++)
    {
        for(r=1; r<=n; r++)
        {
            printf("%.3lf ", nnorm[r][c]);
        }
        printf("\n");
    }   */


    return 0;
}

