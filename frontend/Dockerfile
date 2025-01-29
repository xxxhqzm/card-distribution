# Use an official Nginx image from the Docker Hub
FROM nginx:alpine

# Copy the frontend files (HTML, CSS, and JS) to the Nginx public directory
COPY . /usr/share/nginx/html

# Expose port 80 for the Nginx server
EXPOSE 80

# Run Nginx in the foreground (default behavior for the image)
CMD ["nginx", "-g", "daemon off;"]