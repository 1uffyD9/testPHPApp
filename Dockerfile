# Use the official PHP image with Apache
FROM php:8.2-apache

# Set the maintainer label
LABEL maintainer="PHP Web App"

# Log: Starting Docker build process
RUN echo "=== Starting Docker build for PHP Web Application ==="

# Log: Updating system packages
RUN echo "=== Step 1: Updating system packages ===" && \
    apt-get update && \
    apt-get upgrade -y

# Log: Skipping additional dependencies (not needed for simple JSON API)
RUN echo "=== Step 2: No additional dependencies required for this simple application ==="

# Log: Creating low privilege user
RUN echo "=== Step 3: Creating low privilege user ===" && \
    groupadd -r phpapp && \
    useradd -r -g phpapp -u 1001 -s /bin/bash -m phpapp && \
    echo "Created user 'phpapp' with UID 1001 and group 'phpapp'"

# Log: Setting up working directory
RUN echo "=== Step 4: Setting up working directory ===" && \
    mkdir -p /var/www/html && \
    echo "Working directory created: /var/www/html"

# Set working directory
WORKDIR /var/www/html

# Log: Copying application files
RUN echo "=== Step 5: Copying PHP application files ==="
COPY . /var/www/html/
RUN echo "Application files copied successfully"

# Log: Setting proper permissions
RUN echo "=== Step 6: Setting file permissions for low privilege user ===" && \
    chown -R phpapp:phpapp /var/www/html && \
    chmod -R 755 /var/www/html && \
    echo "File permissions set for user 'phpapp'"

# Log: Configuring Apache
RUN echo "=== Step 7: Configuring Apache settings ===" && \
    echo "ServerName localhost" >> /etc/apache2/apache2.conf && \
    echo "User phpapp" >> /etc/apache2/apache2.conf && \
    echo "Group phpapp" >> /etc/apache2/apache2.conf && \
    echo "Apache configuration updated to run as user 'phpapp'"

# Log: Cleaning up
RUN echo "=== Step 8: Cleaning up temporary files ===" && \
    apt-get clean && \
    rm -rf /var/lib/apt/lists/* && \
    echo "Cleanup completed"

# Expose port 80
EXPOSE 80

# Log: Final setup
RUN echo "=== Step 9: Final setup completed ==="
RUN echo "=== Docker build process finished successfully ==="
RUN echo "=== Application will be available on port 80 ==="
RUN echo "=== Service will run as low privilege user 'phpapp' ==="

# Switch to the low privilege user
USER phpapp

# Start Apache in the foreground
CMD ["apache2-foreground"]
