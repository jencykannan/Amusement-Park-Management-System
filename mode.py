def calculate_time(distance, speed):
    time = distance / speed
    return time

# Define transportation modes and speeds
transportation_modes = {
    'bicycle': 15,           # in km/h
    'walking': 5,            # in km/h
    'two_wheeler': 40,       # in km/h
    'four_wheeler': 60       # in km/h
}

# Get user input for the distance to cover
distance_to_cover = float(input("Enter the distance to cover (in kilometers): "))

# Get user input for the starting location (latitude and longitude)
start_latitude = float(input("Enter the starting latitude: "))
start_longitude = float(input("Enter the starting longitude: "))

# Get user input for the ending location (latitude and longitude)
end_latitude = float(input("Enter the ending latitude: "))
end_longitude = float(input("Enter the ending longitude: "))

# Estimate travel time for each mode
estimated_times = {}

for mode, speed in transportation_modes.items():
    time = calculate_time(distance_to_cover, speed)
    estimated_times[mode] = time

# Output results
for mode, time in estimated_times.items():
    print(f"Time taken by {mode}: {time:.2f} hours")

# Optionally, you can use the entered coordinates in further calculations or API requests.
print(f"Start Location: Latitude {start_latitude}, Longitude {start_longitude}")
print(f"End Location: Latitude {end_latitude}, Longitude {end_longitude}")
