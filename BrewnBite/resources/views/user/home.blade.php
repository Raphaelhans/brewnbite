@extends('template')
@section('content')
  <div class="min-h-screen p-10 flex items-center justify-center bg-[#fcdad0] rounded-br-[150px]">
    <div class="w-1/2 flex flex-col items-center">
      <div class="flex flex-col gap-4">
        <h2 class="text-6xl font-bold text-left text-emerald-600">Sipping Happiness</h2>
        <h2 class="text-6xl font-bold text-left text-emerald-600">Brewing Moments</h2>
        <h2 class="text-6xl font-bold text-left text-emerald-600">Biting Joy</h2>
        <button class="bg-gradient-to-r from-[#F4A298] to-[#E8897A] hover:from-[#e8897a] hover:to-[#d97060] text-white font-bold py-3 px-8 rounded-full w-44 shadow-lg hover:shadow-2xl transition-all duration-300  mt-10">
          Shop Now
        </button>
      </div>
    </div>
    <div class="w-1/2 flex justify-center">
      <img src="{{ asset('assets/banner.png') }}" alt="Coffee Image" class="w-full">
    </div>
  </div>
  <div class="bg-white py-16 px-8">
    <div class="max-w-7xl mx-auto">
      <div class="text-center">
        <p class="text-sm font-semibold text-[#F4A298]">Benefits</p>
        <h2 class="text-4xl font-bold text-emerald-700 mt-2">Why Brew & Bite?</h2>
      </div>
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 mt-12">
        <div class="flex flex-col items-center text-center">
          <div class="relative w-20 h-20 flex items-center justify-center rounded-full">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 300 300" xml:space="preserve"><path fill="#DB7E56" d="M534.723 484.673c-19.37 0-36.618 12.781-47.794 32.69a43.738 43.738 0 0 1 4.894 4.212c21.611 21.611 17.035 61.979-9.142 94.448 10.727 24.739 30.019 41.247 52.042 41.247 33.699 0 61.015-38.637 61.015-86.297 0-47.664-27.316-86.3-61.015-86.3z"/><path fill="#E59477" d="M534.724 657.204a4.55 4.55 0 0 1-3.398-1.51 4.429 4.429 0 0 1 .393-6.313c25.895-22.58 25.74-47.632-.486-78.835-38.763-46.117-.071-84.265.325-84.644a4.574 4.574 0 0 1 6.413.083 4.421 4.421 0 0 1-.08 6.316c-1.44 1.403-32.976 32.919.325 72.541 29.228 34.771 29.064 65.471-.489 91.242a4.566 4.566 0 0 1-3.003 1.12z"/><path fill="#AA6148" d="M473.944 625.673c-33.701 33.701-80.336 41.706-104.165 17.877-23.827-23.827-15.822-70.462 17.877-104.163 33.704-33.702 80.339-41.707 104.166-17.88 23.829 23.828 15.824 70.464-17.878 104.166z"/><path fill="#BC715C" d="M400.077 549.591c29.504-29.502 68.917-39.313 94.264-25.315-.8-.951-1.63-1.881-2.519-2.77-23.827-23.827-70.462-15.822-104.166 17.88-33.7 33.701-41.704 80.336-17.877 104.163a44.09 44.09 0 0 0 9.902 7.435c-20.66-24.527-12.047-68.948 20.396-101.393z"/><path fill="#E59477" d="M498.038 590.87c-3.768 8.595-8.92 17.108-15.403 25.137 10.727 24.748 30.023 41.262 52.052 41.262 3.876 0 7.661-.533 11.336-1.512-23.678-6.298-42.478-31.953-47.985-64.887zM491.823 521.507c4.249 4.249 7.466 9.232 9.726 14.728 7.986-25.618 24.487-44.731 44.466-50.049-3.672-.976-7.454-1.513-11.328-1.513-19.349 0-36.581 12.751-47.759 32.622a43.63 43.63 0 0 1 4.895 4.212z"/><path fill="#BC715C" d="M369.825 643.504a4.552 4.552 0 0 1-1.335-3.471 4.428 4.428 0 0 1 4.742-4.186c34.277 2.344 51.881-15.48 55.4-56.089 5.2-60.02 59.535-59.635 60.082-59.623a4.573 4.573 0 0 1 4.476 4.593 4.42 4.42 0 0 1-4.522 4.41c-2.009-.027-46.594-.041-51.065 51.523-3.92 45.255-25.743 66.847-64.864 64.173a4.546 4.546 0 0 1-2.914-1.33z"/><path fill="#DB7E56" d="M403.821 684.717c-16.968 0-31.962-4.996-41.606-13.898a4.535 4.535 0 1 1 6.154-6.665c18.258 16.856 61.638 16.516 94.695-10.931a4.535 4.535 0 1 1 5.793 6.981c-20.488 17.009-44.243 24.513-65.036 24.513z"/><path fill="#AA6148" d="M482.117 490.587a4.515 4.515 0 0 1-2.928-1.075 4.532 4.532 0 0 1-.53-6.391c.79-.933 19.702-22.853 50.301-22.853a4.535 4.535 0 1 1 0 9.07c-26.44 0-43.213 19.447-43.38 19.643a4.52 4.52 0 0 1-3.463 1.606z"/><g><path fill="#AA6148" d="M560.01 476.024a4.513 4.513 0 0 1-2.643-.852c-3.886-2.793-10.137-3.717-10.199-3.727a4.533 4.533 0 0 1-3.874-5.111c.341-2.483 2.632-4.225 5.111-3.874.864.118 8.599 1.278 14.256 5.344a4.537 4.537 0 0 1-2.651 8.22z"/></g><g><path fill="#161616" d="M534.792 657.257a4.541 4.541 0 0 1-3.398-1.511 4.429 4.429 0 0 1 .392-6.313c25.896-22.58 25.74-47.632-.486-78.835-38.763-46.117-.071-84.265.325-84.644a4.573 4.573 0 0 1 6.413.083 4.421 4.421 0 0 1-.08 6.316c-1.439 1.403-32.976 32.918.325 72.541 29.227 34.771 29.064 65.471-.489 91.242a4.552 4.552 0 0 1-3.002 1.121z"/><path fill="#161616" d="M405.767 661.872c-15.636 0-29.232-5.167-39.127-15.062-15.173-15.173-19.12-39.668-10.56-65.525a4.536 4.536 0 0 1 5.73-2.88 4.533 4.533 0 0 1 2.88 5.73c-7.459 22.534-4.332 43.566 8.364 56.263 22.021 22.021 65.874 14.005 97.751-17.877 31.879-31.881 39.9-75.732 17.879-97.753-22.023-22.02-65.872-13.997-97.753 17.88-7.061 7.062-13.092 14.855-17.926 23.166a4.535 4.535 0 1 1-7.84-4.562c5.226-8.985 11.737-17.402 19.352-25.017 35.418-35.415 85.027-43.436 110.58-17.88 25.559 25.557 17.538 75.163-17.879 110.58-16.956 16.957-37.634 28.241-58.223 31.776-4.54.775-8.96 1.161-13.228 1.161z"/><path fill="#161616" d="M534.791 661.857c-23.251 0-44.263-16.441-56.202-43.978a4.535 4.535 0 0 1 .629-4.651c24.903-30.887 28.972-68.889 9.467-88.394a39.588 39.588 0 0 0-4.389-3.775 4.536 4.536 0 0 1-1.253-5.864c12.489-22.246 31.351-35.005 51.749-35.005 31.935 0 59.083 31.568 64.551 75.063a4.534 4.534 0 0 1-3.935 5.065 4.533 4.533 0 0 1-5.065-3.935c-4.89-38.893-28.253-67.123-55.551-67.123-16.035 0-31.142 9.821-41.898 27.091a47.703 47.703 0 0 1 2.204 2.068c22.683 22.683 19.6 63.68-7.084 98.301 10.586 22.639 27.924 36.065 46.777 36.065 29.611 0 54.357-33.494 56.337-76.254.117-2.501 2.244-4.414 4.741-4.321a4.537 4.537 0 0 1 4.321 4.741c-2.205 47.612-30.932 84.906-65.399 84.906z"/><path fill="#161616" d="M369.893 643.557a4.552 4.552 0 0 1-1.335-3.471 4.427 4.427 0 0 1 4.742-4.185c34.277 2.344 51.881-15.48 55.401-56.089 5.2-60.02 59.534-59.635 60.082-59.623a4.574 4.574 0 0 1 4.476 4.593 4.421 4.421 0 0 1-4.522 4.41c-2.009-.027-46.594-.041-51.064 51.523-3.92 45.255-25.743 66.847-64.864 64.173a4.55 4.55 0 0 1-2.916-1.331zM403.889 684.77c-16.968 0-31.962-4.996-41.605-13.898a4.536 4.536 0 0 1 6.154-6.664c18.257 16.853 61.64 16.516 94.695-10.931a4.535 4.535 0 1 1 5.793 6.981c-20.489 17.008-44.244 24.512-65.037 24.512zM482.185 490.64a4.515 4.515 0 0 1-2.928-1.075 4.532 4.532 0 0 1-.53-6.391c.79-.933 19.702-22.853 50.301-22.853a4.535 4.535 0 1 1 0 9.07c-26.44 0-43.213 19.447-43.38 19.643a4.52 4.52 0 0 1-3.463 1.606zM560.078 476.077a4.513 4.513 0 0 1-2.643-.852c-3.886-2.793-10.137-3.717-10.199-3.726a4.533 4.533 0 0 1-3.874-5.111c.341-2.483 2.628-4.233 5.111-3.874.864.118 8.598 1.279 14.256 5.344a4.537 4.537 0 0 1-2.651 8.219z"/></g><g><path fill="#DB7E56" d="M208.809 62.154c-19.37 0-36.618 12.781-47.794 32.69a43.738 43.738 0 0 1 4.894 4.212c21.611 21.611 17.035 61.979-9.142 94.448 10.727 24.739 30.019 41.247 52.042 41.247 33.699 0 61.015-38.637 61.015-86.297 0-47.664-27.316-86.3-61.015-86.3z"/><path fill="#E59477" d="M208.81 234.684a4.547 4.547 0 0 1-3.398-1.51 4.429 4.429 0 0 1 .393-6.313c25.895-22.58 25.74-47.632-.486-78.835-38.763-46.117-.071-84.265.325-84.644a4.574 4.574 0 0 1 6.413.083 4.421 4.421 0 0 1-.08 6.316c-1.439 1.403-32.976 32.918.325 72.541 29.228 34.771 29.064 65.471-.489 91.242a4.559 4.559 0 0 1-3.003 1.12z"/><path fill="#AA6148" d="M148.03 203.154c-33.701 33.701-80.337 41.706-104.165 17.877-23.827-23.827-15.822-70.462 17.877-104.163 33.704-33.702 80.339-41.707 104.166-17.88 23.829 23.828 15.825 70.463-17.878 104.166z"/><path fill="#BC715C" d="M74.163 127.072c29.504-29.502 68.917-39.313 94.264-25.315-.8-.951-1.63-1.881-2.519-2.77-23.827-23.827-70.463-15.822-104.166 17.88-33.7 33.701-41.704 80.336-17.877 104.163a44.09 44.09 0 0 0 9.902 7.435c-20.66-24.528-12.047-68.949 20.396-101.393z"/><path fill="#E59477" d="M172.124 168.351c-3.768 8.595-8.92 17.108-15.403 25.137 10.727 24.748 30.023 41.262 52.052 41.262 3.876 0 7.661-.533 11.336-1.512-23.678-6.299-42.478-31.954-47.985-64.887zM165.909 98.987c4.249 4.249 7.466 9.232 9.726 14.728 7.986-25.618 24.487-44.731 44.466-50.049-3.672-.976-7.454-1.513-11.328-1.513-19.349 0-36.581 12.751-47.759 32.622a43.748 43.748 0 0 1 4.895 4.212z"/><path fill="#BC715C" d="M43.911 220.985a4.552 4.552 0 0 1-1.335-3.471 4.429 4.429 0 0 1 4.742-4.186c34.277 2.344 51.881-15.48 55.4-56.089 5.2-60.02 59.535-59.635 60.082-59.623a4.573 4.573 0 0 1 4.476 4.593 4.42 4.42 0 0 1-4.522 4.41c-2.009-.027-46.594-.041-51.065 51.523-3.92 45.255-25.743 66.847-64.864 64.173a4.558 4.558 0 0 1-2.914-1.33z"/><path fill="#DB7E56" d="M77.907 262.198c-16.968 0-31.962-4.996-41.606-13.898a4.535 4.535 0 1 1 6.154-6.664c18.258 16.856 61.638 16.516 94.695-10.931a4.537 4.537 0 0 1 5.794 6.981c-20.489 17.007-44.244 24.512-65.037 24.512z"/><path fill="#AA6148" d="M156.203 68.068a4.533 4.533 0 0 1-3.458-7.466c.79-.933 19.702-22.853 50.301-22.853a4.535 4.535 0 1 1 0 9.07c-26.44 0-43.213 19.446-43.38 19.643a4.517 4.517 0 0 1-3.463 1.606z"/><g><path fill="#AA6148" d="M234.096 53.505a4.513 4.513 0 0 1-2.643-.852c-3.886-2.793-10.137-3.717-10.199-3.727a4.533 4.533 0 0 1-3.874-5.111c.341-2.483 2.632-4.225 5.111-3.874.864.118 8.598 1.278 14.256 5.344a4.537 4.537 0 0 1-2.651 8.22z"/></g><g><path fill="#161616" d="M208.878 234.738a4.545 4.545 0 0 1-3.398-1.511 4.428 4.428 0 0 1 .393-6.313c25.895-22.58 25.74-47.632-.486-78.835-38.763-46.117-.071-84.265.325-84.644a4.574 4.574 0 0 1 6.413.083 4.421 4.421 0 0 1-.08 6.316c-1.439 1.403-32.976 32.918.325 72.541 29.228 34.771 29.064 65.471-.489 91.242a4.56 4.56 0 0 1-3.003 1.121z"/><path fill="#161616" d="M79.853 239.352c-15.636 0-29.232-5.167-39.127-15.062-15.173-15.173-19.12-39.668-10.56-65.525a4.536 4.536 0 0 1 5.73-2.88 4.533 4.533 0 0 1 2.88 5.73c-7.459 22.534-4.332 43.566 8.364 56.263 22.021 22.021 65.874 14.005 97.752-17.877 31.879-31.881 39.9-75.732 17.879-97.753-22.023-22.02-65.872-13.997-97.753 17.88-7.062 7.061-13.092 14.855-17.926 23.166a4.535 4.535 0 1 1-7.84-4.562c5.226-8.985 11.737-17.402 19.352-25.017 35.418-35.415 85.027-43.436 110.58-17.88 25.559 25.557 17.538 75.163-17.879 110.58-16.956 16.958-37.634 28.241-58.223 31.776-4.54.776-8.961 1.161-13.229 1.161z"/><path fill="#161616" d="M208.877 239.338c-23.251 0-44.263-16.441-56.202-43.978a4.535 4.535 0 0 1 .629-4.651c24.903-30.887 28.972-68.889 9.467-88.394a39.588 39.588 0 0 0-4.389-3.775 4.536 4.536 0 0 1-1.253-5.864c12.489-22.246 31.351-35.005 51.749-35.005 31.935 0 59.083 31.568 64.551 75.063a4.534 4.534 0 0 1-3.935 5.065 4.533 4.533 0 0 1-5.065-3.934c-4.89-38.893-28.253-67.123-55.551-67.123-16.035 0-31.142 9.821-41.898 27.091a47.198 47.198 0 0 1 2.204 2.068c22.683 22.683 19.6 63.68-7.084 98.301 10.585 22.639 27.924 36.065 46.777 36.065 29.611 0 54.357-33.494 56.337-76.254.117-2.501 2.244-4.414 4.741-4.321a4.537 4.537 0 0 1 4.321 4.741c-2.205 47.61-30.932 84.905-65.399 84.905z"/><path fill="#161616" d="M43.979 221.038a4.552 4.552 0 0 1-1.335-3.471 4.427 4.427 0 0 1 4.742-4.185c34.277 2.344 51.881-15.48 55.401-56.089 5.2-60.02 59.534-59.635 60.082-59.623a4.575 4.575 0 0 1 4.477 4.593 4.421 4.421 0 0 1-4.522 4.41c-2.009-.027-46.594-.041-51.064 51.523-3.92 45.255-25.743 66.847-64.864 64.173a4.555 4.555 0 0 1-2.917-1.331zM77.975 262.251c-16.968 0-31.962-4.996-41.605-13.898a4.535 4.535 0 1 1 6.154-6.664c18.257 16.853 61.64 16.516 94.695-10.931a4.535 4.535 0 1 1 5.793 6.981c-20.489 17.007-44.244 24.512-65.037 24.512zM156.271 68.121a4.515 4.515 0 0 1-2.928-1.075 4.532 4.532 0 0 1-.53-6.391c.79-.933 19.702-22.853 50.301-22.853a4.535 4.535 0 1 1 0 9.07c-26.44 0-43.213 19.447-43.38 19.643a4.517 4.517 0 0 1-3.463 1.606zM234.164 53.558a4.513 4.513 0 0 1-2.643-.852c-3.886-2.793-10.137-3.717-10.199-3.726a4.532 4.532 0 0 1-3.874-5.111c.341-2.483 2.628-4.233 5.111-3.874.864.118 8.598 1.279 14.256 5.345a4.537 4.537 0 0 1-2.651 8.218z"/></g></g></svg>
          </div>
          <p class="mt-4 text-lg font-medium text-gray-800">Unparalleled Coffee Quality</p>
        </div>
        <div class="flex flex-col items-center text-center">
          <div class="relative w-20 h-20 flex items-center justify-center rounded-full">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 300 300" xml:space="preserve"><path fill="#AA6148" d="M193.142 164.402c1.73-3.251 2.767-7.281 2.767-11.663.003-10.739-6.154-19.441-13.745-19.438-7.586-.003-13.742 8.699-13.742 19.438 0 2.799.425 5.454 1.178 7.857l23.542 3.806z"/><path fill="#AA6148" d="M222.463 148.921c-7.592-7.594-18.097-9.395-23.462-4.025-4.748 4.742-3.868 13.503 1.65 20.723l27.552 4.452c3.085-5.713.874-14.536-5.74-21.15z"/><path fill="#AA6148" d="M251.996 173.921a26.552 26.552 0 0 0 4.526-5.891c5.312-9.333 4.261-19.94-2.341-23.69-6.593-3.75-16.246.771-21.552 10.107-3.071 5.398-3.951 11.188-2.923 15.868l22.29 3.606z"/><path fill="#F4F4F4" d="M132.859 176.833h18.142v13.261h-18.142z"/><path fill="#FFDA88" d="m132.859 173.231-87.728-5.847c-8.876 0-16.078 7.199-16.078 16.075 0 8.885 7.202 16.087 16.078 16.087l87.728-5.85v-20.465z"/><path fill="#FFE2A9" d="M40.959 183.459c0-7.521 5.194-13.789 12.174-15.54l-8.002-.535c-8.876 0-16.078 7.199-16.078 16.075 0 8.885 7.202 16.087 16.078 16.087l8.002-.535c-6.98-1.754-12.174-8.023-12.174-15.552z"/><path fill="#F4F4F4" d="M270.941 189.946c0 9.218-7.473 16.694-16.695 16.694h-86.55c-9.221 0-16.695-7.326-16.695-16.544v-13.261c0-9.218 7.473-16.544 16.695-16.544l103.245 16.695v12.96z"/><path fill="#F9F9F9" d="M167.158 190.094v-13.261c0-6.744 4.007-12.461 9.767-15.053l-9.23-1.491c-9.221 0-16.695 7.326-16.695 16.544v13.261c0 9.218 7.473 16.544 16.695 16.544h16.158c-9.221 0-16.695-7.326-16.695-16.544z"/><path fill="#BC715C" d="m182.347 162.533 8.017 1.332c.679-3.549-.219-8.082-4.769-13.89-4.048-5.173-1.716-8.238-.514-9.322 1.692-1.462 1.937-4.054.532-5.82a3.97 3.97 0 0 0-5.702-.587c-2.858 2.4-8.542 10.837-.635 20.941 2.808 3.584 3.552 5.642 3.071 7.346zM212.474 162.976c7.237.756 8.285 2.48 8.38 5.965l8.69 1.352c.062-5.274-.543-13.996-16.128-15.623-6.883-.721-7.376-4.595-7.267-6.245.206-2.273-1.521-4.29-3.889-4.518-2.389-.266-4.518 1.438-4.754 3.738-.395 3.783 1.518 13.919 14.968 15.331zM236.642 171.592l11.448 1.745c1.547-2.767 2.262-6.715 1.273-12.472-1.125-6.564 2.702-8.052 4.414-8.383 2.377-.413 3.966-2.551 3.561-4.801-.411-2.277-2.714-3.815-5.102-3.416-3.974.635-13.807 5.096-11.61 17.932 1.201 7.009-.338 8.376-3.984 9.395z"/><path fill="#FFDA88" d="M177.236 103.121a5.04 5.04 0 1 1-10.077 0v-9.26a5.038 5.038 0 0 1 10.077 0v9.26zM156.227 114.619a5.04 5.04 0 1 1 0 10.077h-9.26a5.038 5.038 0 0 1 0-10.077h9.26zM236.642 103.121a5.04 5.04 0 1 0 10.078 0v-9.26a5.039 5.039 0 0 0-5.04-5.037 5.038 5.038 0 0 0-5.038 5.037v9.26zM257.65 114.619a5.04 5.04 0 1 0 0 10.077h9.26a5.038 5.038 0 0 0 0-10.077h-9.26z"/><g><path fill="#161616" d="M193.145 168.937c-.239 0-.481-.018-.723-.059l-23.542-3.806a4.538 4.538 0 0 1-3.605-3.121 30.826 30.826 0 0 1-1.385-9.213c0-6.124 1.724-11.935 4.86-16.367 3.416-4.834 8.306-7.606 13.414-7.606H182.173c5.108 0 9.998 2.773 13.417 7.606 3.133 4.432 4.86 10.246 4.857 16.367 0 4.97-1.14 9.741-3.298 13.795a4.54 4.54 0 0 1-4.004 2.404zm-19.854-12.339 17.079 2.761c.661-2.049 1.007-4.293 1.007-6.62 0-4.202-1.163-8.259-3.192-11.129-.998-1.408-3.103-3.774-6.015-3.774h-.003c-2.911 0-5.017 2.365-6.012 3.774-2.031 2.87-3.195 6.927-3.195 11.129 0 1.314.11 2.604.331 3.859z"/><path fill="#161616" d="M228.206 174.607c-.239 0-.481-.018-.723-.059l-27.552-4.453a4.518 4.518 0 0 1-2.879-1.721c-7.019-9.18-7.544-20.403-1.252-26.687 3.605-3.611 9.021-5.111 14.867-4.11 5.347.918 10.677 3.806 15.006 8.138 7.969 7.966 10.65 18.871 6.526 26.512a4.544 4.544 0 0 1-3.993 2.38zm-24.948-13.161 21.75 3.514c.254-3.602-1.426-8.507-5.749-12.833-2.97-2.97-6.661-5.017-10.125-5.61-1.71-.292-4.866-.472-6.921 1.586-2.731 2.725-2.232 8.262 1.045 13.343z"/><path fill="#161616" d="M251.999 178.457c-.239 0-.481-.018-.724-.059l-22.29-3.605a4.532 4.532 0 0 1-3.706-3.505c-1.32-6-.074-12.957 3.41-19.083 3.024-5.321 7.397-9.52 12.31-11.823 5.359-2.516 10.987-2.513 15.425.018 4.444 2.522 7.329 7.352 7.91 13.246.534 5.4-.839 11.306-3.868 16.63a31.137 31.137 0 0 1-5.3 6.892 4.531 4.531 0 0 1-3.167 1.289zm-18.171-12.068 16.5 2.666a22.472 22.472 0 0 0 2.256-3.266c2.079-3.652 3.071-7.754 2.725-11.25-.168-1.719-.833-4.816-3.366-6.254-2.525-1.438-5.531-.419-7.092.307-3.183 1.494-6.201 4.444-8.277 8.096-1.801 3.17-2.749 6.571-2.746 9.701zM182.35 162.533l8.017 1.332c.679-3.549-.219-8.082-4.769-13.89-4.048-5.173-1.716-8.238-.514-9.322 1.692-1.462 1.937-4.054.531-5.82a3.97 3.97 0 0 0-5.702-.587c-2.858 2.4-8.542 10.837-.635 20.941 2.809 3.584 3.553 5.642 3.072 7.346z"/><path fill="#161616" d="M212.477 162.976c7.237.756 8.285 2.48 8.38 5.965l8.69 1.352c.062-5.274-.543-13.996-16.128-15.623-6.883-.721-7.376-4.595-7.267-6.245.206-2.273-1.521-4.29-3.889-4.518-2.389-.266-4.517 1.438-4.754 3.738-.395 3.783 1.518 13.919 14.968 15.331zM236.645 171.592l11.448 1.745c1.547-2.767 2.262-6.715 1.273-12.472-1.125-6.564 2.702-8.052 4.414-8.383 2.377-.413 3.965-2.551 3.561-4.801-.41-2.277-2.713-3.815-5.102-3.416-3.974.635-13.807 5.096-11.61 17.932 1.201 7.009-.338 8.376-3.984 9.395zM151.004 194.629h-18.142a4.536 4.536 0 0 1-4.535-4.535v-13.261a4.536 4.536 0 0 1 4.535-4.535h18.142a4.536 4.536 0 0 1 4.535 4.535v13.261a4.536 4.536 0 0 1-4.535 4.535zm-13.606-9.071h9.071v-4.19h-9.071v4.19z"/><path fill="#161616" d="M45.417 204.072c-11.66 0-20.896-9.248-20.896-20.613s9.248-20.61 20.613-20.61l15.203 1.001a4.54 4.54 0 0 1 4.225 4.828c-.168 2.501-2.386 4.352-4.828 4.225l-14.902-.992c-6.062.009-11.241 5.185-11.241 11.548 0 6.369 5.179 11.551 11.542 11.551l83.193-5.557v-11.979L80.657 174.3a4.538 4.538 0 0 1-4.225-4.828c.165-2.504 2.353-4.376 4.828-4.225l51.903 3.458a4.537 4.537 0 0 1 4.234 4.527v20.465a4.537 4.537 0 0 1-4.234 4.527l-87.728 5.849-.018-.001z"/><g><path fill="#161616" d="M254.249 211.176h-14.211a4.536 4.536 0 0 1 0-9.07h14.211c6.706 0 12.159-5.454 12.159-12.159v-9.097l-99.046-16.016c-6.549.174-11.823 5.492-11.823 12.003v13.261c0 6.623 5.454 12.009 12.159 12.009h51.416a4.536 4.536 0 0 1 0 9.07h-51.416c-11.708 0-21.23-9.458-21.23-21.079v-13.261c0-11.622 9.523-21.08 21.23-21.08.242 0 .484.021.723.059l103.245 16.695a4.533 4.533 0 0 1 3.812 4.476v12.96c.001 11.707-9.522 21.229-21.229 21.229z"/></g><g><path fill="#161616" d="M177.239 103.121a5.04 5.04 0 1 1-10.078 0v-9.26a5.039 5.039 0 0 1 5.04-5.037 5.038 5.038 0 0 1 5.038 5.037v9.26z"/></g><g><path fill="#161616" d="M156.23 114.619a5.04 5.04 0 1 1 0 10.077h-9.26a5.038 5.038 0 0 1 0-10.077h9.26z"/></g><g><path fill="#161616" d="M236.645 103.121a5.04 5.04 0 1 0 10.077 0v-9.26a5.038 5.038 0 0 0-10.077 0v9.26z"/></g><g><path fill="#161616" d="M257.654 114.619a5.04 5.04 0 1 0 0 10.077h9.26a5.038 5.038 0 0 0 0-10.077h-9.26z"/></g></g></svg>
          </div>
          <p class="mt-4 text-lg font-medium text-gray-800">Fresh, Handcrafted Bites</p>
        </div>
        <div class="flex flex-col items-center text-center">
          <div class="relative w-20 h-20 flex items-center justify-center  rounded-full">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 300 300" xml:space="preserve"><path fill="#F4F4F4" d="M110.333 252.453h56.601c12.576-8.892 20.808-23.518 20.808-40.091v-39.225H89.525v39.225c0 16.573 8.235 31.199 20.808 40.091z"/><path fill="#F9F9F9" d="M102.754 212.363v-39.225H89.525v39.225c0 16.572 8.235 31.199 20.808 40.091h13.228c-12.572-8.893-20.807-23.519-20.807-40.091z"/><path fill="#AA6148" d="M152.038 225.778c-9.933 9.937-23.687 12.297-30.712 5.273-7.018-7.026-4.662-20.775 5.277-30.711 9.933-9.936 23.681-12.297 30.708-5.272 7.025 7.026 4.665 20.776-5.273 30.71z"/><path fill="#BC715C" d="M131.669 204.99c8.569-8.569 19.96-11.486 27.443-7.627-.526-.848-1.119-1.652-1.837-2.37-7.028-7.024-20.775-4.664-30.709 5.272-9.939 9.936-12.295 23.685-5.276 30.711a12.97 12.97 0 0 0 3.266 2.355c-4.597-7.443-1.81-19.421 7.113-28.341z"/><path fill="#BC715C" d="M124.164 232.245c-2.288 0-4.175-1.828-4.246-4.141-.071-2.359 1.769-4.329 4.119-4.403l.546-.018c6.945-.208 10.113-.301 11.394-11.833 1.719-15.521 13.128-18.512 18.921-17.904 2.339.239 4.039 2.337 3.803 4.686a4.257 4.257 0 0 1-4.624 3.821c-1.418-.111-8.495-.109-9.656 10.344-2.096 18.906-12.207 19.207-19.588 19.43l-.537.016c-.044.002-.088.002-.132.002z"/><path fill="#F4F4F4" d="M99.523 270.49h99.111c9.959 0 18.035-8.075 18.035-18.037H81.485c0 9.963 8.076 18.037 18.038 18.037z"/><path fill="#F9F9F9" d="M99.302 252.453H81.485c0 9.962 8.076 18.037 18.038 18.037h17.817c-9.962 0-18.038-8.074-18.038-18.037z"/><path fill="#F4F4F4" d="M203.055 180.221h-15.313v8.774h15.313a6.588 6.588 0 0 1 6.573 6.264l-4.804 28.999a4.196 4.196 0 0 0-.062.716 6.588 6.588 0 0 1-6.579 6.58h-14.368a48.995 48.995 0 0 1-4.842 8.774h19.21c8.335 0 15.139-6.678 15.348-14.963l4.819-29.072c.038-.238.059-.477.059-.717 0-8.468-6.889-15.355-15.354-15.355z"/><path fill="#9AE8CE" d="M112.152 43.721c-30.23 0-54.741 24.51-54.741 54.74v57.49l20.415-14.879c9.39 7.577 21.319 12.13 34.326 12.13 30.233 0 54.741-24.507 54.741-54.741 0-30.23-24.508-54.74-54.741-54.74z"/><path fill="#AEF4DB" d="M69.884 98.461c0-28.119 21.215-51.261 48.504-54.36-2.049-.233-4.125-.381-6.236-.381-30.23 0-54.741 24.51-54.741 54.74v57.49l12.472-9.09V98.461z"/><path fill="#F4F4F4" d="M187.742 28.603c-18.921 0-35.598 9.602-45.428 24.196 14.802 9.799 24.579 26.582 24.579 45.662a54.496 54.496 0 0 1-9.31 30.545 54.454 54.454 0 0 0 30.159 9.078c13.007 0 24.936-4.553 34.325-12.13l20.415 14.879v-57.49c0-30.23-24.51-54.74-54.74-54.74zM81.485 95.553h8.566v8.567h-8.566zM107.868 95.553h8.569v8.567h-8.569zM134.351 95.553h8.566v8.567h-8.566z"/><path fill="#9AE8CE" d="M183.407 80.435h8.566v8.567h-8.566zM209.89 80.435h8.569v8.567h-8.569z"/><g><path fill="#161616" d="M166.987 256.989h-56.601a4.537 4.537 0 0 1-2.619-.833c-14.228-10.063-22.723-26.434-22.723-43.793v-39.225a4.535 4.535 0 0 1 4.535-4.535h98.215a4.535 4.535 0 0 1 4.535 4.535v39.225c0 17.361-8.495 33.732-22.724 43.793a4.531 4.531 0 0 1-2.618.833zm-55.12-9.071h53.641c11.141-8.417 17.752-21.604 17.752-35.555v-34.69H94.115v34.69c0 13.95 6.61 27.137 17.752 35.555z"/><path fill="#161616" d="M198.688 275.025h-9.201a4.535 4.535 0 0 1 0-9.07h9.201c5.852 0 10.848-3.745 12.717-8.966H86.857c1.868 5.221 6.864 8.966 12.719 8.966h68.988a4.535 4.535 0 0 1 0 9.07H99.576c-12.447 0-22.574-10.126-22.574-22.572a4.535 4.535 0 0 1 4.535-4.535h135.185a4.535 4.535 0 0 1 4.535 4.535c.001 12.446-10.124 22.572-22.569 22.572zM203.108 180.221h-15.313v8.774h15.313a6.59 6.59 0 0 1 6.573 6.264l-4.804 28.999a4.196 4.196 0 0 0-.062.716c0 3.628-2.952 6.58-6.578 6.58h-14.368a48.938 48.938 0 0 1-4.843 8.774h19.211c8.335 0 15.139-6.678 15.348-14.963l4.819-29.072c.038-.238.059-.477.059-.717-.001-8.468-6.89-15.355-15.355-15.355zM57.465 160.486a4.536 4.536 0 0 1-4.536-4.535v-57.49c0-13.615 4.518-26.434 13.063-37.074a4.535 4.535 0 1 1 7.071 5.682C65.825 76.08 62 86.935 62 98.461v48.572l13.209-9.627a4.537 4.537 0 0 1 5.519.136c9.019 7.278 19.904 11.124 31.478 11.124 27.683 0 50.205-22.522 50.205-50.205s-22.522-50.205-50.205-50.205c-8.53 0-16.98 2.203-24.435 6.37a4.54 4.54 0 0 1-6.173-1.746 4.538 4.538 0 0 1 1.747-6.173 59.293 59.293 0 0 1 28.861-7.522c32.685 0 59.276 26.591 59.276 59.276s-26.591 59.276-59.276 59.276c-12.304 0-24.381-3.889-34.379-11.015l-17.691 12.895a4.544 4.544 0 0 1-2.671.869z"/><path fill="#161616" d="M242.536 145.368a4.539 4.539 0 0 1-2.672-.87l-17.69-12.895c-9.998 7.126-22.074 11.015-34.379 11.015a59.012 59.012 0 0 1-32.663-9.831 4.543 4.543 0 0 1-1.258-6.316c5.584-8.293 8.536-17.979 8.536-28.011 0-16.879-8.43-32.535-22.549-41.88a4.536 4.536 0 0 1-1.257-6.316c11.051-16.404 29.44-26.198 49.191-26.198 32.684 0 59.276 26.591 59.276 59.276v57.49a4.53 4.53 0 0 1-2.48 4.042 4.499 4.499 0 0 1-2.055.494zm-78.638-17.883a49.935 49.935 0 0 0 23.896 6.063c11.575 0 22.458-3.846 31.476-11.124a4.542 4.542 0 0 1 5.522-.136L238 131.916V83.343c0-27.683-22.523-50.205-50.205-50.205a50.158 50.158 0 0 0-39.06 18.664c14.325 11.208 22.746 28.323 22.746 46.659 0 10.245-2.607 20.187-7.583 29.024zM81.538 95.553h8.567v8.567h-8.567zM107.921 95.553h8.567v8.567h-8.567zM134.404 95.553h8.567v8.567h-8.567z"/><path fill="#161616" d="M183.46 80.435h8.566v8.567h-8.566zM209.943 80.435h8.569v8.567h-8.569zM131.915 239.771c-5.454 0-10.241-1.846-13.774-5.377-8.929-8.938-6.611-25.244 5.275-37.128 11.885-11.885 28.191-14.195 37.123-5.272 4.468 4.47 6.239 10.947 4.987 18.24-1.152 6.716-4.795 13.422-10.261 18.884v.002c-5.461 5.462-12.168 9.106-18.886 10.259a26.41 26.41 0 0 1-4.464.392zm14.815-44.078c-5.312 0-11.749 2.838-16.901 7.989-8.014 8.012-10.429 19.14-5.274 24.299 2.325 2.322 5.981 3.195 10.29 2.458 4.885-.839 9.859-3.585 14.005-7.733l.001-.001c4.149-4.147 6.898-9.121 7.736-14.005.738-4.308-.136-7.962-2.463-10.29-1.841-1.841-4.444-2.717-7.394-2.717z"/><path fill="#161616" d="M123.278 233.054a4.536 4.536 0 0 1-.137-9.069l1.329-.034c7.147-.173 10.106-.245 11.412-11.965.743-6.66 3.245-11.641 7.441-14.809 5.752-4.343 12.317-3.399 13.041-3.273a4.538 4.538 0 0 1 3.723 5.225c-.413 2.457-2.746 4.11-5.179 3.728-.165-.018-3.546-.433-6.188 1.612-2.087 1.615-3.374 4.482-3.824 8.522-2.184 19.593-12.602 19.844-20.208 20.028l-1.267.034-.143.001z"/></g></svg>
          </div>
          <p class="mt-4 text-lg font-medium text-gray-800">A Space to Connect</p>
        </div>
      </div>
    </div>
  </div>
  <div class="bg-cover bg-center py-10 my-10 w-full" style="background-image: url('{{ asset('assets/linen.jpg') }}');">
    <div class="text-center">
      <p class="text-gray-500 text-sm font-medium" id="date">{{ $date }}</p>
    </div>
    <div class="flex items-center justify-center mt-4">
      <img src="http://openweathermap.org/img/wn/{{ $weatherData['weather'][0]['icon'] }}@2x.png" alt="Weather Icon">
      <div class="ml-4 text-center">
          <p id="weather-description" class="text-2xl font-semibold text-gray-800">{{ ucfirst($weatherData['weather'][0]['main']) }}</p>
          <p id="temperature" class="text-xl text-gray-500">{{ round($weatherData['main']['temp']) }}°C</p>
      </div>
    </div>
    <h1 class="text-emerald-600 text-center font-semibold text-2xl my-10">Recommendations based on the weather and time of day</h1>
    <div class="flex items-center justify-center p-4 my-10">
      <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <div class="bg-white rounded-3xl shadow-xl overflow-hidden w-72 md:w-80 transform hover:scale-105 transition-transform duration-300">
          <img src="https://assets.promediateknologi.id/crop/0x0:0x0/750x500/webp/photo/2023/05/22/Red-Velvet-cake-2453917777.png" alt="Red Velvet Cake" class="w-full h-48 object-cover">
          <div class="p-5">
            <div class="flex justify-between items-center">
              <h3 class="font-bold text-emerald-600 text-base">Red Velvet Cake</h3>
              <p class="text-gray-500 text-sm font-medium">Rp 50.000</p>
            </div>
            <div class="flex items-center mt-3 space-x-2">
              <i class="fa-solid fa-star text-yellow-400 text-sm"></i>
              <span class="text-gray-600 font-medium text-sm">4.96</span>
              <span class="text-gray-400 text-sm">(76 reviews)</span>
            </div>
            <button class="mt-6 w-full bg-gradient-to-r from-emerald-500 to-emerald-700 text-white py-3 px-6 text-sm font-semibold rounded-xl hover:from-emerald-600 hover:to-emerald-800 shadow-md transition-all duration-300">
              Buy Now
            </button>
          </div>
        </div>
        <div class="bg-white rounded-3xl shadow-xl overflow-hidden w-72 md:w-80 transform hover:scale-105 transition-transform duration-300">
          <img src="https://assets.promediateknologi.id/crop/0x0:0x0/750x500/webp/photo/2023/05/22/Red-Velvet-cake-2453917777.png" alt="Red Velvet Cake" class="w-full h-48 object-cover">
          <div class="p-5">
            <div class="flex justify-between items-center">
              <h3 class="font-bold text-emerald-600 text-base">Red Velvet Cake</h3>
              <p class="text-gray-500 text-sm font-medium">Rp 50.000</p>
            </div>
            <div class="flex items-center mt-3 space-x-2">
              <i class="fa-solid fa-star text-yellow-400 text-sm"></i>
              <span class="text-gray-600 font-medium text-sm">4.96</span>
              <span class="text-gray-400 text-sm">(76 reviews)</span>
            </div>
            <button class="mt-6 w-full bg-gradient-to-r from-emerald-500 to-emerald-700 text-white py-3 px-6 text-sm font-semibold rounded-xl hover:from-emerald-600 hover:to-emerald-800 shadow-md transition-all duration-300">
              Buy Now
            </button>
          </div>
        </div>
        <div class="bg-white rounded-3xl shadow-xl overflow-hidden w-72 md:w-80 transform hover:scale-105 transition-transform duration-300">
          <img src="https://assets.promediateknologi.id/crop/0x0:0x0/750x500/webp/photo/2023/05/22/Red-Velvet-cake-2453917777.png" alt="Red Velvet Cake" class="w-full h-48 object-cover">
          <div class="p-5">
            <div class="flex justify-between items-center">
              <h3 class="font-bold text-emerald-600 text-base">Red Velvet Cake</h3>
              <p class="text-gray-500 text-sm font-medium">Rp 50.000</p>
            </div>
            <div class="flex items-center mt-3 space-x-2">
              <i class="fa-solid fa-star text-yellow-400 text-sm"></i>
              <span class="text-gray-600 font-medium text-sm">4.96</span>
              <span class="text-gray-400 text-sm">(76 reviews)</span>
            </div>
            <button class="mt-6 w-full bg-gradient-to-r from-emerald-500 to-emerald-700 text-white py-3 px-6 text-sm font-semibold rounded-xl hover:from-emerald-600 hover:to-emerald-800 shadow-md transition-all duration-300">
              Buy Now
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <div class="flex justify-center my-10">
    <div 
      class="flex items-center justify-center h-96 bg-fixed bg-cover bg-center rounded-3xl w-[70rem] flex-col shadow-2xl"
      style="background-image: url('https://images.pexels.com/photos/3551722/pexels-photo-3551722.jpeg?cs=tinysrgb&w=1260&h=750&dpr=1');">
      <h3 class="font-semibold tracking-wider text-2xl text-[#37FFAD]">Our Location</h3>
      <div class="flex flex-row mt-5">
        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-10 h-10 text-white" viewBox="0 0 24 24">
          <path d="M12 2C8.13401 2 5 5.13401 5 9C5 13.6622 11.1825 21.6618 11.5323 22.0726C11.8005 22.3945 12.1995 22.3945 12.4677 22.0726C12.8175 21.6618 19 13.6622 19 9C19 5.13401 15.866 2 12 2ZM12 11.5C10.6193 11.5 9.5 10.3807 9.5 9C9.5 7.61929 10.6193 6.5 12 6.5C13.3807 6.5 14.5 7.61929 14.5 9C14.5 10.3807 13.3807 11.5 12 11.5Z"/>
        </svg>
        <h1 class="text-white font-bold text-3xl px-5 mt-1">SURABAYA, Ngagel Jaya Tengah No.73-77</h1>
      </div>
    </div>
  </div>

@endsection